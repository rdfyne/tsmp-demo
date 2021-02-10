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
	<body id="kt_body" class="header-fixed header-mobile-fixed header-bottom-enabled subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					@include('backoffice.partials.header/desktop')
					@yield('content')
					@include('backoffice.partials/footer')
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		@include('backoffice.partials/sidepanel')
		@include('backoffice.assets/script')
	</body>
</html>