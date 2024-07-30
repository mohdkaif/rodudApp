<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ActivityLog;
use App\Models\Organization\Users\User;

class LogController extends Controller
{
    public function index()
    {
        $data = ActivityLog::orderBy("id", "desc")->limit(450)->get();
        $object = [];
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $object[] = [
                    'id' => $v['id'],
                    'data' => getUser($v['causer_id']),
                    'log_name' => $v['log_name'],
                    'event' => $v['log_name'] . ' ' . $v['description'],
                    'time' => ___ago($v->created_at)
                ];
            }
        }
        return view('pages.admin.logs.index', compact('object'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
