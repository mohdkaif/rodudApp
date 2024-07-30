<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerSupport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerSupportController extends Controller
{
    public function index()
    {
        $data['supports'] = CustomerSupport::get();
        return view('pages.admin.supports.index', $data);
    }
    public function create()
    {
        return view('pages.admin.supports.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=>'required',
            'last_name'=>'required',
           // 'mobile_number'=>'required',
            'subject' => 'required',
            'email' => 'required|email:rfc,dns',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {

            $users = new CustomerSupport();
            $users['first_name'] = $request->first_name;
            $users['last_name'] = $request->last_name;
            $users['email'] = $request->email;
            $users['support_type'] = 'sent';
            $users['mobile_number'] = $request->mobile_number;
            $users['subject'] = $request->subject;
            $users['message'] = $request->message;
            $users['status'] = !empty($request->status)?$request->status:'progress';
            $users['user_id'] = Auth::user()->id;
            
            $users->save();
            // Sending Email to the user to set password
          try {
            $data = [
                'subject' => $request->subject,
                'messageContent' => $request->message,  // 'message' might be reserved, use 'messageContent' instead
            ];
        
            Mail::send('email_templates.ticket', $data, function ($message) use ($request) {
                $message->to($request->email)->subject($request->subject);
            });
                $this->status = true;
                $this->modal = true;
                $this->redirect = url('admin/customer_support');
                $this->message = "Sent Successfully!";
            } catch (\Exception $e) {
                $this->status = true;
                $this->modal = true;
                $this->redirect = url('admin/customer_support');
                $this->message = "Added Successfully! Found an issue with sending an email" . $e->getMessage();
            }
        }
        return $this->populateresponse();
    }
    public function edit($order_id)
    {
        $order_id = ___decrypt($order_id);
        $data['status_array'] =['pending','progress','active','closed'];
        $data['support'] = CustomerSupport::where('id', $order_id)->first();
        return view('pages.admin.supports.edit', $data);
    }

    public function update(Request $request, $order_id)
    {
        $order_id = ___decrypt($order_id);
        $validator = Validator::make($request->all(), [
           'first_name'=>'required',
            'last_name'=>'required',
            'subject' => 'required',
            'email' => 'required|email:rfc,dns',
            'status' => 'required',
            'message' => 'required',
        ]);
        if ($validator->fails()) {
            $this->message = $validator->errors();
        } else {
            $users = new CustomerSupport();
            $users['first_name'] = $request->first_name;
            $users['last_name'] = $request->last_name;
            $users['email'] = $request->email;
            $users['support_type'] = 'sent';
            $users['subject'] = $request->subject;
            $users['mobile_number'] = $request->mobile_number;
            $users['message'] = $request->message;

            $users['status'] = !empty($request->status)?$request->status:'progress';
            $users['user_id'] = Auth::user()->id;
            $users['parent_id'] = $order_id;

            $users->save();
           
            $data = [
                'subject' => $request->subject,
                'messageContent' => $request->message,  // 'message' might be reserved, use 'messageContent' instead
            ];
        
            Mail::send('email_templates.ticket', $data, function ($message) use ($request) {
                $message->to($request->email)->subject($request->subject);
            });
            $this->status = true;
            $this->modal = true;
            $this->redirect = url('admin/customer_support');
            $this->message = " Updated Successfully!";
        }
        return $this->populateresponse();
    }
    public function destroy(Request $request, $id)
    {
        if (!empty($request->status)) {
            if ($request->status == 'active') {
                $status = 'inactive';
            } else {
                $status = 'active';
            }
            $users = CustomerSupport::find(___decrypt($id));
            $users->status = $status;
            $users->save();
        } else {
            User::destroy(___decrypt($id));
        }
        $this->status = true;
        $this->modal = true;
        $this->redirect = true;
        return $this->populateresponse();
    }

    public function bulkDelete(Request $request)
    {
        $id_string = implode(',', $request->bulk);
        $processID = explode(',', ($id_string));
        foreach ($processID as $idval) {
            $processIDS[] = ___decrypt($idval);
        }
       
       // if (CustomerSupport::whereIn('id', $processIDS)->update($update)) {
            CustomerSupport::destroy($processIDS);
       // }
        $this->status = true;
        $this->redirect = true;
        return $this->populateresponse();
    }
}
