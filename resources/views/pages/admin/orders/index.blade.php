@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>

            <li class="breadcrumb-item active" aria-current="page">Orders Management</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0"> Orders Management</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            {{-- <button type="button" class="btn btn-sm btn-outline-info btn-icon-text mr-2 d-none d-md-block">
                <i class="btn-icon-prepend" data-feather="download"></i>
                Import
            </button> --}}
            {{-- <a href="{{ url('admin/order_requests/create') }}" class="btn btn-sm btn-secondary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add Order
            </a> --}}
            <button type="button" data-url="{{ url('admin/order_requests/bulk-delete') }}" data-method="POST"
                data-request="ajax-confirm" data-ask_image="warning" data-ask="Are you sure you want to delete?"
                data-id="bulk-delete" class="btn btn-sm btn-danger btn-icon-text mb-2 mb-md-0 deletebulk">
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
                                <th>PickUp Address</th>
                                <th>PickUp Address</th>
                                <th>Size</th>
                                <th>Weight</th>
                                <th>Pickup Date</th>
                                <th>Delivery Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </thead>
                            <tbody>
                                @php
                                    $cnt = count($orders);
                                @endphp
                                @if (!empty($orders))
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><input type="checkbox" value="{{ ___encrypt($order->id) }}"
                                                    class="checkSingle" name="select_all[]"></td>
                                            <td>{{ $order->pickup_address }}</td>
                                            <td>{{ $order->delivery_address }}</td>
                                            <td>{{ $order->size }}</td>
                                            <td>{{ $order->weight }}</td>
                                            <td>{{ $order->pickup_date_time }}</td>
                                            <td>{{ $order->delivery_date_time }}</td>
                                            <td class="text-center">
                                                <div class="custom-control custom-switch">
                                                    {{-- <input type="checkbox" class="custom-control-input" data-url="{{ url('admin/order_requests/' . ___encrypt($order->id) . '?status=' . $order->status) }}" data-method="DELETE" data-request="ajax-confirm" data-ask_image="warning" data-ask="Are you sure you want change Status?" id="customSwitch{{ ___encrypt($order->id) }}" @if ($order->status == 'active') checked @endif >
                                        <label class="custom-control-label" for="customSwitch{{ ___encrypt($order->id) }}"></label> --}}
                                                    {{-- <select class="js-example-basic-single" name="user_id" id="user_id">
                                            <option value="">Select Status</option>
                                            @if (!empty($status_array))
                                                @foreach ($status_array as $value)
                                                    <option value="{{ $value }}" @if ($value == $order->status) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select> --}}
                                                    @php
                                                        // Example status
                                                        $status = str_replace('_', ' ', $order->status);
                                                        $status = ucwords($status);
                                                    @endphp
                                                    {{ $status }}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm" role="group">
                                                    
                                                  
                                                    <a class="btn btn-icon"
                                                        href="{{ url('admin/order_requests/' . ___encrypt($order->id) . '/edit') }}"
                                                        class="btn btn-info" data-toggle="tooltip" data-placement="bottom"
                                                        title="Edit Profile">
                                                        <i class="fas fa-edit text-secondary"></i>
                                                    </a>
                                                    
                                                    <a class="btn btn-icon" href="javascript:void(0);"
                                                        data-url="{{ url('admin/order_requests/' . ___encrypt($order->id)) }}"
                                                        data-method="DELETE" data-request="ajax-confirm"
                                                        data-ask_image="warning" data-ask="Are you sure you want to delete?"
                                                        class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                        data-placement="bottom" title="Delete User">
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
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('custom-scripts')
    <script>
        var cnt = '{{ $cnt }}'
        $(function() {
            if (cnt > 10) {
                $('#user_list').DataTable();
            }
        });
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
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
