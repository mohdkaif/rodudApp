<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\UserEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Tenant\TenantUser;
use App\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm(Request $request)
    {
        if ($request->path() != 'logout') {
            $data['redirect_url'] = !empty(url()->previous()) ? url()->previous() : url('/dashboard');
        } else {
            $data['redirect_url'] = url('/organization/profile');
        }
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::user()->status != 'active') {
                    Auth::logout();
                    $validator->errors()->add('email', 'user must be active for login.');
                    return Redirect::back()->withErrors($validator);
                }
                if (empty(Auth::user()->email_verified_at)) {
                    Auth::logout();
                    $validator->errors()->add('email', 'please verify your email.');
                    return Redirect::back()->withErrors($validator);
                }
                if (two_factor_is_enable()) {
                    $users = User::find(Auth::user()->id);
                    $rem_token = Str::random(60);
                    $users['remember_token'] = $rem_token;
                    $users->save();
                    $user = Auth::user();
                    $name = $user->first_name . ' ' . $user->last_name;
                    $email = $user->email;
                    $title = 'Two Factor Authentication OTP';
                    $otp = rand(100000, 10000000);
                    $otp_data['user_id'] = ___encrypt(Auth::user()->id);
                    $otp_data['otp'] = ___encrypt($otp);
                    $request->session()->put('otp_data', $otp_data);
                    Auth::logout();
                    $new_data = User::find(___decrypt($otp_data['user_id']));
                    $url = url('authenticate/two_factor_auth/' . $new_data['remember_token'] . '/otp_verify?email=' . $user->email);
                    
                    // Mail::send('email_templates.two_factor_otp', ['name' => $name, 'url' => $url, 'email' => $email, 'title' => $title, 'otp' => $otp], function ($message) use ($user) {
                    //     $message->to($user->email)->subject('Two Factor Authentication OTP');
                    // });
                    Session::flash('success', 'Two Factor Authentication OTP Sent Successfully Please Check Your Email');
                    return redirect('authenticate/two_factor_auth/' . $new_data['remember_token'] . '/otp_verify?email=' . $email . '&redirect_url=' . $request->redirect_url);
                }
                return redirect('admin/dashboard/');

                
            } else {
                $validator->errors()->add('password', 'Wrong email OR password.');
                return Redirect::back()->withErrors($validator);
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }

  

    public function two_factor(Request $request, $rem_token)
    {
        $user = User::where('remember_token', $rem_token)->first();
        $data['email'] = $user->email;
        $data['redirect_url'] = $request->redirect_url;
        $data['rem_token'] = $rem_token;
        return view('auth.two_factor', $data);
    }

    public function two_factor_auth(Request $request, $rem_token)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required',
        ]);
        $session = Session('otp_data');
        if (empty($session)) {
            $validator->errors()->add('otp', 'Token Expired!');
            return Redirect::back()->withErrors($validator);
        }
        $otp = ___decrypt($session['otp']);

        $user_id = ___decrypt($session['user_id']);
        if (!empty($otp)) {
            if (intval($request->otp) != $otp) {
                $validator->errors()->add('otp', 'OTP not Matched! Please enter correct OTP');
                return Redirect::back()->withErrors($validator);
            }
        }
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            $user = User::where('email', $request->email)->first();
            //Now log in the user if exists
            if (!empty($user)) {
                Auth::loginUsingId($user->id);
                if (Auth::user()->status != 'active') {
                    Auth::logout();
                    $validator->errors()->add('otp', 'user must be active for login.');
                    return Redirect::back()->withErrors($validator);
                }
                if (empty(Auth::user()->email_verified_at)) {
                    Auth::logout();
                    $validator->errors()->add('email', 'please verify your email.');
                    return Redirect::back()->withErrors($validator);
                }
                Session::forget('otp_data');
                if (!empty(Auth::user()->currency_type) && !empty(Auth::user()->timezone) && !empty(Auth::user()->date_format) && !empty(Auth::user()->language)) {
                    return redirect($request->redirect_url);
                } else {
                    return redirect('/organization/profile?update=preference');
                }
            } else {
                $validator->errors()->add('otp', 'OTP Miss Matched!');
                return Redirect::back()->withErrors($validator);
            }
        }
    }

    public function resend_otp(Request $request)
    {
        $users = User::where('remember_token', $request->token)->first();
        $name = $users['first_name'] . ' ' . $users['last_name'];
        $email = $users->email;
        $title = 'Two Factor Authentication OTP';
        $otp = rand(100000, 10000000);
        $otp_data['user_id'] = ___encrypt($users->id);
        $otp_data['otp'] = ___encrypt($otp);
        $request->session()->put('otp_data', $otp_data);
        $new_data = User::find(___decrypt($otp_data['user_id']));
        $url = url('authenticate/two_factor_auth/' . $new_data['remember_token'] . '/otp_verify?email=' . $users->email);
        Mail::send('email_templates.two_factor_otp', ['name' => $name, 'url' => $url, 'email' => $email, 'title' => $title, 'otp' => $otp], function ($message) use ($users) {
            $message->to($users->email)->subject('Two Factor Authentication OTP');
        });
        
        $response = [
            'success' => true,
            'status_code' => 200,
            'status' => true,
            'message' => "Two Factor Authentication OTP Sent Successfully Please Check Your Email"
        ];
        return response()->json($response);
    }
}
