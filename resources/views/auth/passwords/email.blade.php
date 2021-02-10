@extends('auth.master', ['title' => 'Forgot Password'])

@section('content')
    <!--begin::Login forgot password form-->
    <div class="login-forgot">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="mb-20">
            <h3>Forgotten Password ?</h3>
            <div class="text-muted font-weight-bold">Enter your email to reset your password</div>
        </div>
        <form class="form" id="kt_login_forgot_form" method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mb-10">
                <input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                @include('backoffice.partials/error', ['field' => 'email'])
            </div>
            <div class="form-group d-flex flex-wrap flex-center mt-10">
                <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
                <button type="button" onclick='window.location.href = @json(route("login"))' id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
            </div>
        </form>
    </div>
    <!--end::Login forgot password form-->
@endsection
