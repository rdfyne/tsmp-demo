@extends('auth.master', ['title' => 'Login'])

@section('content')
    <!--begin::Login Sign in form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3>Sign In To Admin</h3>
            <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
        </div>
        <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                @include('backoffice.partials/error', ['field' => 'email'])
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                @include('backoffice.partials/error', ['field' => 'password'])
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <div class="checkbox-inline">
                    <label class="checkbox m-0 text-muted">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                    <span></span>Remember me</label>
                </div>
                <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-muted text-hover-primary">Forget Password ?</a>
            </div>
            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
        </form>
    </div>
    <!--end::Login Sign in form-->
@endsection
