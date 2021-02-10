@extends('auth.master', ['title' => 'Reset Password'])

@section('content')
    <!--begin::Reset password form-->
    <div class="login-signin">
        <div class="mb-20">
            <h3>Reset Password</h3>
            <div class="text-muted font-weight-bold">Enter and confirm your new password:</div>
        </div>
        <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email" name="email" value="{{ old('email', $email) }}" required autocomplete="email" autofocus />
                @include('backoffice.partials/error', ['field' => 'email'])
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="New Password" name="password" required autocomplete="new-password" />
                @include('backoffice.partials/error', ['field' => 'password'])
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Reset</button>
        </form>
    </div>
    <!--end::Reset password form-->
@endsection
