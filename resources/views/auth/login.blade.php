@extends('layouts.auth')
@section('content')
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a href="{{ route('login') }}" class="mb-12">
            <img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-40px" />
        </a>
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}">
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">Sign In</h1>
                </div>
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">Username</label>
                    <input class="form-control form-control-lg form-control-solid" type="text" value=""
                           name="username" id="username" autocomplete="off" />
                </div>
                <div class="fv-row mb-10">
                    <div class="d-flex flex-stack mb-2">
                        <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                        <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
                    </div>
                    <input class="form-control form-control-lg form-control-solid" id="password"
                           value=""
                           type="password"
                           name="password" autocomplete="off" />
                </div>
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
                <div class="text-center">
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">Continue</span>
                        <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
