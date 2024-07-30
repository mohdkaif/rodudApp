@extends('layout.admin.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/admin/customer_support')}}">Customer Support</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reply Mail</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card shadow">
            <form action="{{url('/admin/customer_support/'.___encrypt($support->id))}}" method="POST" role="user">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Reply Mail</h4>
                </div>
                <input type="hidden" name="_method" value="PUT">
                <div class="card-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">First Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="First Name"></i></span>
                            </label>
                            <input type="text" readonly value="{{$support->first_name}}" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">Last Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Last Name"></i></span>
                            </label>
                            <input type="text" readonly name="last_name" class="form-control" placeholder="Last Name" value="{{$support->last_name}}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">Email Address
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Email Address"></i></span>
                            </label>
                            <input type="email" readonly oninput="this.value = this.value.toLowerCase()" name="email" value="{{$support->email}}" class="form-control" placeholder="Email Address">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile_number">Mobile Number
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Mobile Number"></i></span>
                            </label>
                            <input type="number" readonly value="{{$support->mobile_number}}" name="mobile_number" class="form-control" placeholder="Mobile Number">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="mobile_number">Subject
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Subject"></i></span>
                            </label>
                            <input type="text" readonly value="{{$support->subject}}" name="subject" class="form-control" placeholder="Subject">
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
                                            @if ($value == $support->status) selected @endif>{{ $status }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Received Message
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Message"></i></span>
                            </label>
                            <p>{{$support->message}}</p>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Your Message
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Message"></i></span>
                            </label>
                            <textarea name="message" style="height: 150px; width: 100%;"></textarea>
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" id="submit_button_id" data-request="ajax-submit" data-target='[role="user"]' class="btn btn-sm btn-secondary submit">Submit</button>
                        <button id="submit_button_loader" style="display: none;" class="btn btn-sm btn-secondary submit" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            {{Config::get('constants.message.loader_button_msg')}}
                        </button>
                        <a href="{{url('/admin/customer_support')}}" class="btn btn-sm btn-danger">Cancel</a>
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