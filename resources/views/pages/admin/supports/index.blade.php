@php
use Illuminate\Support\Str;

@endphp
@extends('layout.admin.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>

        <li class="breadcrumb-item active" aria-current="page">Customer Support Management</li>
    </ol>
</nav>
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0"> Customer Support Management</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a href="{{ url('admin/customer_support/create') }}" class="btn btn-sm btn-secondary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="plus"></i>
           Send Email
        </a>
       
        <button type="button" data-url="{{ url('admin/customer_support/bulk-delete') }}" data-method="POST" data-request="ajax-confirm" data-ask_image="warning" data-ask="Are you sure you want to delete?" data-id="bulk-delete" class="btn btn-sm btn-danger btn-icon-text mb-2 mb-md-0 deletebulk">
            <i class="btn-icon-prepend" data-feather="trash"></i>
            Delete
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="user_list" class="table table-hover mb-0">
                        <thead>
                            <th><input type="checkbox" id="example-select-all"></th>
                            <th>Full Name</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Sent/Received</th>
                            <th>Subject</th>

                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Message</th>

                            <th class="text-center">Actions</th>
                        </thead>
                        <tbody>
                            @php
                            $cnt = count($supports);
                            @endphp
                            @if (!empty($supports))
                            @foreach ($supports as $support)
                            <tr>
                                <td><input type="checkbox" value="{{ ___encrypt($support->id) }}" class="checkSingle" name="select_all[]"></td>
                                <td>{{ $support->first_name }} {{ $support->last_name }}</td>
                                <td class="text-center">
                                    {{ucwords($support->status)}}
                                 </td>
                                 <td class="text-center">
                                    {{ucwords($support->support_type)}}
                                 </td>
                                 <td> {{Str::limit($support->subject,50)}} </td>

                                <td>{{ $support->email }}</td>
                                <td> {{$support->mobile_number}} </td>
                                <td  style="width: 200px;"> {{Str::limit($support->message,100)}} </td>

                                <td class="text-center">
                                    <div class="btn-group btn-group-sm" role="group">
                                        
                                        <a class="btn btn-icon" href="{{ url('admin/customer_support/' . ___encrypt($support->id) . '/edit') }}" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Edit Profile">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <a class="btn btn-icon" href="{{ url('/admin/customer_support/' . ___encrypt($support->id) . '/set-password') }}" class="btn btn-icon" data-toggle="tooltip" data-placement="bottom" title="Set New Password">
                                            <i class="fas fa-unlock text-secondary"></i>
                                        </a>
                                        <a class="btn btn-icon" href="javascript:void(0);" data-url="{{ url('admin/customer_support/' . ___encrypt($support->id)) }}" data-method="DELETE" data-request="ajax-confirm" data-ask_image="warning" data-ask="Are you sure you want to delete?" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Delete User">
                                            <i class="fas fa-trash text-secondary"></i>
                                        </a>
                                    </div>
                                </td>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="{{ asset('/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
    var cnt = '{{ $cnt }}'
    $(function() {
        if (cnt > 10) {
            $('#user_list').DataTable();
        }
    });
    $(".deletebulk").hide();
    $("#example-select-all").click(function() {
        if ($(this).is(":checked")) {
            $(".deletebulk").show();
        } else {
            $(".deletebulk").hide();
        }
        $('.checkSingle').not(this).prop('checked', this.checked);
    });

    $('.checkSingle').click(function() {
        if ($('.checkSingle:checked').length == $('.checkSingle').length) {
            $('#example-select-all').prop('checked', true);
        } else {
            $('#example-select-all').prop('checked', false);
        }
        var len = $("[name='select_all[]']:checked").length;
        if (len > 1) {
            $(".deletebulk").show();
        } else {
            $(".deletebulk").hide();
        }
    });
</script>
@endpush