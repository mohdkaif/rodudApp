@extends('layout.console.master2')

@section('content')
<div class="">
    
            <div class="card">
                <div class="row">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
        
                                <div class="col-md-4 pr-md-0 logo_class" style="display: flex;
            flex-direction: row;
            align-items: center;
            
            justify-content: space-around;">
                                    <div class="auth-left-wrapper"
                                        style="background-repeat: no-repeat;height:150px;width:150px;background-image: url({{ url('assets/images/rodud_logo.svg') }})">
        
                                    </div>
                                </div>
        
                                <div class="col-md-8 pl-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                            <a href="/" class="noble-ui-logo d-block mb-3">
                                <img class="img-fluid" src="{{ asset('/assets/images/logo.png') }}" alt="" width="150px;">
                            </a>
                            <br>
                            <h5 class="text-primary font-weight-heavy mb-2">Verify OTP! </h5>
                            <h6 class="text-muted font-weight-normal mb-5">Log in to your account.</h6>
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {!! Session::get('success') !!}
                            </div>
                            @endif
                            <form method="POST" action="{{ url('authenticate/two_factor_auth/'.$rem_token.'/otp_verify') }}">
                                @csrf
                                <input id="email" type="hidden"  name="email" value="{{$email}}"  >
                                <input type="hidden" value="{{$redirect_url}}" name="redirect_url">
                                <div class="form-group">
                                    <label for="otp">Enter OTP</label>
                                    <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror" name="otp"  autocomplete="Enter OTP">
                                    @if($errors->first('otp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('otp') }}</strong>
                                    </span>
                                    @enderror
                                    @if($errors->first('otp_msg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('otp_msg') }}</strong>
                                    </span>
                                    @enderror
                                </div>
                               
                                <div class="mt-3">
                                    <!-- <a type="button" id="submit_button_id" data-request="ajax-submit" data-target='[role="login"]' class="btn btn-secondary mr-2 mb-2 mb-md-0">Login</a> -->
                                    <button type="submit" class="btn btn-primary" style="width:100%">
                                        OTP Verify
                                    </button>
                                </div>
                                <a href="javascript:void(0);"
                                onclick="resend_otp('{{$rem_token}}')"
                                                        
                                                         class="d-block mt-3 text-muted">Resend OTP</a>
                                <!-- <a href="{{url('/') }}" class="d-block mt-3 text-muted">Login</a> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
</div>
@endsection

@push('custom-scripts')
<script type="text/javascript">
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            isLocal: false
        });
    });

    function resend_otp(token) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ url("/authenticate/resend_otp") }}',
            method: 'POST',
            data: {
                token: token,
               
            },
            success: function(data) {
              if (data.success === true) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: data.message,
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.errors,
                    })
                }
            }
        });  
    }

</script>
@endpush