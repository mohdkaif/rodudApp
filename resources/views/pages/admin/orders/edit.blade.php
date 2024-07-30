@extends('layout.admin.master')

@push('plugin-styles')
    <link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/order_requests') }}">Order Request</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Request Change</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 stretch-card">
            <div class="card shadow">
                <form action="{{ url('/admin/order_requests/' . ___encrypt($order->id)) }}" method="POST" role="user">
                    <div class="card-header">
                        <h4 class="mb-3 mb-md-0">Order Request Change</h4>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="card-body">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="first_name">Pickup Address
                                    <span class="text-danger">*</span>
                                    <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top"
                                            title="Pickup Address"></i></span>
                                </label>
                                <input type="text" value="{{ $order->pickup_address }}" disabled class="form-control"
                                    >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="first_name">Delivery Address
                                    <span class="text-danger">*</span>
                                    <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top"
                                            title="Pickup Address"></i></span>
                                </label>
                                <input type="text" value="{{ $order->delivery_address }}" disabled class="form-control"
                                    >
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Change Status
                                    <span class="text-danger">*</span>
                                    <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top"
                                            title="Change Status"></i></span>
                                </label>
                                <select class="js-example-basic-single" name="status" id="user_id">
                                    <option value="">Select Status</option>
                                    @if (!empty($status_array))
                                        @foreach ($status_array as $value)
                                        @php
                                        // Example status
                                        $status = str_replace('_', ' ', $value);
                                        $status = ucwords($status);
                                    @endphp
                                            <option value="{{ $value }}"
                                                @if ($value == $order->status) selected @endif>{{ $status }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            
                          
                        </div>
                        <div class="card-footer text-right">
                            <button type="button" id="submit_button_id" data-request="ajax-submit"
                                data-target='[role="user"]' class="btn btn-sm btn-secondary submit">Submit</button>
                            <button id="submit_button_loader" style="display: none;" class="btn btn-sm btn-secondary submit"
                                type="button" disabled>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                {{ Config::get('constants.message.loader_button_msg') }}
                            </button>
                            <a href="{{ url('/admin/order_requests') }}" class="btn btn-sm btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('/assets/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
    <script>
        $(function() {
            // Tags
            // $('#tags').tagsInput({
            //     'interactive': true,
            //     'defaultText': 'Add More',
            //     'removeWithBackspace': true,
            //     'minChars': 0,
            //     'maxChars': 20,
            //     'placeholderColor': '#666666'
            // });
            // Multi Select
            if ($(".js-example-basic-single").length) {
                $(".js-example-basic-single").select2();
            }
        });
    </script>
@endpush
