<?php


use Hashids\Hashids;
use Illuminate\Support\Facades\Session;


function uploadFileAws($request, $file_name, $folder_name)
{
    $file = $request->file($file_name);
    $imageName = 'uploads/' . $folder_name . '/' . time() . $file->getClientOriginalName();
    Storage::disk('s3')->put($imageName, file_get_contents($file));
    Storage::disk('s3')->setVisibility($imageName, 'public');
    $url = Storage::disk('s3')->url($imageName);
    return $url;
}

function upload_file($request, $file_name, $folder_name, $sub_folder = null)
{
    $file       = $request->file($file_name);
    $extension  = $file->getClientOriginalExtension();
    $file_name  = $file->getClientOriginalName();
    $backupLoc =  'assets/uploads/' . $folder_name;
    if ($sub_folder != null) {
        if (!is_dir($backupLoc . '/' . $sub_folder)) {
            mkdir($backupLoc . '/' . $sub_folder, 0755, true);
        }
        $backupLoc = $backupLoc . '/' . $sub_folder;
    }
    if (!is_dir($backupLoc)) {
        mkdir($backupLoc, 0755, true);
    }
    $file->move($backupLoc, $file_name);
    return ($backupLoc . '/' . $file_name);
}

function makeSlug($string)
{
    return str_replace(' ', '-', $string);
}

function _arefy($data)
{
    return json_decode(json_encode($data), true);
}

function ___encrypt($record_id)
{
    $hashids = new Hashids('', 10);
    $id = $hashids->encode($record_id);
    return $id;
}

function ___decrypt($encrypted_id)
{
    $hashids = new Hashids('', 10);
    $numbers = $hashids->decode($encrypted_id);
    return $numbers[0];
}

function active_class($path, $active = 'active')
{
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path)
{
    return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function dateFormate($date)
{
    $created_at = !empty(Auth::user()->settings['date_format']) ? Auth::user()->settings['date_format'] : '';
    if ($created_at == 'yyyy-mm-dd') {
        return \Carbon\Carbon::parse($date)->format('Y-m-d');
    } elseif ($created_at == 'mm-dd-yyyy') {
        return \Carbon\Carbon::parse($date)->format('m-d-Y');
    } else {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}

function dateTimeFormate($date)
{
    $created_at = !empty(Auth::user()->settings['date_format']) ? Auth::user()->settings['date_format'] : '';
    if ($created_at == 'yyyy-mm-dd') {
        return \Carbon\Carbon::parse($date)->format('Y-m-d h:i:s');
    } elseif ($created_at == 'mm-dd-yyyy') {
        return \Carbon\Carbon::parse($date)->format('m-d-Y h:i:s');
    } else {
        return \Carbon\Carbon::parse($date)->format('d-m-Y h:i:s');
    }
}

function ___ago($date_time)
{
    return Carbon\Carbon::parse($date_time)->diffForHumans();
}

function redirect_notification($module_id)
{
    return url($module_id);
}

function sessionGet()
{
    return \Session::get('sidebar_menu_toggle');
}

function two_factor_is_enable()
{
    
    if (Auth::user()->role == 'admin') {
        if (Auth::user()->two_factor_auth == 'true') {
            return 'checked';
        }
    }
}



function sub_menu_name($name)
{
    $new_name = str_replace('_', ' ', $name);
    return ucfirst($new_name);
}

