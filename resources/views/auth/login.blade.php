@extends('layout.console.master2')

@section('content')
    <div class="page-content d-flex align-items-center justify-content-center">
        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">

                        <div class="col-md-4 pr-md-0 logo_class" style="display: flex;
    flex-direction: row;
    align-items: center;
    
    justify-content: space-around;">
                            <div class="auth-left-wrapper"
                                style="height:150px;width:150px;background-image: url({{ url('assets/images/rodud_logo.svg') }})">

                            </div>
                        </div>

                        <div class="col-md-8 pl-md-0">
                        <input type="hidden" value="{{ $redirect_url }}" name="redirect_url">

                            <div class="auth-form-wrapper px-4 py-5">

                                <a href="#" class="noble-ui-logo d-block mb-2">Rodud<span>App (رودود)</span></a>

                                <h5 class="text-primary font-weight-heavy mb-2">Welcome back ! </h5>
                                <h6 class="text-muted font-weight-normal mb-5">Log in to your account.</h6>
                                @if (Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {!! Session::get('success') !!}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input id="email" type="text"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @if ($errors->first('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <input type="hidden" value="{{ $redirect_url }}" name="redirect_url">
                                    <div class="form-group mt-2">
                                        <label for="password" class="">Password </label>
                                        <a href="javascript:void(0)" data-target="#change-div"
                                            data-request="ajax-append-list" data-url="{{ route('password.request') }}"
                                            class="d-block text-muted float-right">Forgot
                                            Password?</a>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">
                                        @if ($errors->first('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <div class="form-check form-check-flat form-check-secondary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">
                                        Remember me
                                    </label>
                                </div>
                                <div class="mt-3">
                                    <!-- <a type="button" id="submit_button_id" data-request="ajax-submit" data-target='[role="login"]' class="btn btn-secondary mr-2 mb-2 mb-md-0">Login</a> -->
                                    <button type="submit" class="btn btn-primary" style="width:100%">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

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
</script>
@endpush
