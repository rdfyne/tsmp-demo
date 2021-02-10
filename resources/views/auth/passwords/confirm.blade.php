@extends('auth.master', ['title' => 'Confirm Password'])

@section('content')
    <!--begin::Confirm password form-->
    <div class="login-forgot">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-20">
            <h3>Confirm Password</h3>
            <div class="text-muted font-weight-bold">Please confirm your password before continuing.</div>
        </div>
        <form class="form" id="kt_login_forgot_form" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="form-group mb-10">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Enter Password" name="password" required autocomplete="current-password" />
                @include('backoffice.partials/error', ['field' => 'password'])
            </div>
            <div class="form-group d-flex flex-wrap flex-center mt-10">
                <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Confirm</button>
            </div>
        </form>
        <div class="mt-10">
            <span class="opacity-70 mr-4">Forgot Your Password?</span>
            <a href="{{ route('password.request') }}" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Request Reset</a>
        </div>
    </div>
    <!--end::Confirm password form-->
@endsection
