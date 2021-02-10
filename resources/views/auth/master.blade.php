<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<title>
			{{ $title }} &vert; Backoffice &vert; {{ config('app.name') }}
		</title>
		@include('backoffice.assets/style')
	</head>
	<body>
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url({{ asset('backoffice/media/bg/bg-3.jpg') }});">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="{{ config('app.url') }}">
								<img src="{{ asset('front/img/web-logo.png') }}" class="max-h-75px" alt="{{ config('app.name') }}" />
							</a>
						</div>
						<!--end::Login Header-->
						@yield('content')
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		@include('backoffice.assets/script')
	</body>
</html>