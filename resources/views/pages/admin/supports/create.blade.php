@extends('layout.admin.master')

@push('plugin-styles')
<link href="{{ asset('/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/admin/customer_support')}}">Send Mail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Send Mail</li>
    </ol>
</nav>

<div class="row">
    <div class="col-md-12 stretch-card">
        <div class="card shadow">
            <form action="{{url('/admin/customer_support')}}" method="POST" role="user">
                <div class="card-header">
                    <h4 class="mb-3 mb-md-0">Send Mail</h4>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="first_name">First Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="First Name"></i></span>
                            </label>
                            <input type="text"  value="" name="first_name" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="last_name">Last Name
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Last Name"></i></span>
                            </label>
                            <input type="text"  name="last_name" class="form-control" placeholder="Last Name" value="">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mobile_number">Mobile Number
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Mobile Number"></i></span>
                            </label>
                            <input type="number" name="mobile_number" class="form-control" placeholder="Mobile Number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name">Subject
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Subject"></i></span>
                            </label>
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email Address
                                <span class="text-danger">*</span>
                                <span><i class="icon-sm" data-feather="info" data-toggle="tooltip" data-placement="top" title="Email Address"></i></span>
                            </label>
                            <input type="email" oninput="this.value = this.value.toLowerCase()" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="email">Message
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
       
        if ($(".js-example-basic-single").length) {
            $(".js-example-basic-single").select2();
        }
    });
</script>
@endpush