<!--begin::Header-->
<div id="kt_header" class="header flex-column header-fixed">
	<!--begin::Top-->
	<div class="header-top">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Left-->
			<div class="d-none d-lg-flex align-items-center mr-3">
				<!--begin::Logo-->
				<a href="{{ route('front.category.index') }}" class="mr-20">
					<img alt="Logo" src="{{ asset('front/img/web-logo.png') }}" class="max-h-35px" />
				</a>
				<!--end::Logo-->
				<!--begin::Tab Navs(for desktop mode)-->
				<ul class="header-tabs nav align-self-end font-size-lg" role="tablist">
					<!--begin::Item-->
					<li class="nav-item">
						<a href="{{ route('backoffice.home') }}" class="nav-link">
							Home
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="{{ route('backoffice.category.index') }}" class="nav-link">
							Categories
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="{{ route('backoffice.course.index') }}" class="nav-link">
							Courses
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="{{ route('backoffice.venue.index') }}" class="nav-link">
							Venues
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="{{ route('backoffice.user.index') }}" class="nav-link">
							Users
						</a>
					</li>
					<!--end::Item-->

					<!--begin::Item-->
					<li class="nav-item mr-3">
						<a href="{{ route('backoffice.inhouse.index') }}" class="nav-link">
							In-house Training
						</a>
					</li>
					<!--end::Item-->
				</ul>
				<!--begin::Tab Navs-->
			</div>
			<!--end::Left-->
			<!--begin::Topbar-->
			<div class="topbar">
				<!--begin::User-->
				<div class="topbar-item">
					<div class="btn btn-icon btn-hover-transparent-white w-sm-auto d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
						<div class="d-flex flex-column text-right pr-sm-3">
							<span class="text-white opacity-50 font-weight-bold font-size-sm d-none d-sm-inline">{{ Auth::user()->name }}</span>
							<span class="text-white font-weight-bolder font-size-sm d-none d-sm-inline">{{ Auth::user()->role }}</span>
						</div>
						<span class="symbol symbol-35">
							<span class="symbol-label font-size-h5 font-weight-bold text-white bg-white-o-30">
								<i class="flaticon2-user"></i>
							</span>
						</span>
					</div>
				</div>
				<!--end::User-->
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Top-->
	<!--begin::Bottom-->
	<div class="header-bottom" style="display: none">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Header Menu Wrapper-->
			<div class="header-navs header-navs-left" id="kt_header_navs">
				<!--begin::Tab Navs(for tablet and mobile modes)-->
				<ul class="header-tabs p-5 p-lg-0 d-flex d-lg-none nav nav-bold nav-tabs" role="tablist">
					<!--begin::Item-->
					<li class="nav-item mr-2">
						<a href="{{ route('backoffice.home') }}" class="nav-link">
							Home
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-2">
						<a href="{{ route('backoffice.category.index') }}" class="nav-link">
							Categories
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-2">
						<a href="{{ route('backoffice.course.index') }}" class="nav-link">
							Courses
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-2">
						<a href="{{ route('backoffice.venue.index') }}" class="nav-link">
							Venues
						</a>
					</li>
					<!--end::Item-->
					<!--begin::Item-->
					<li class="nav-item mr-2">
						<a href="{{ route('backoffice.user.index') }}" class="nav-link">
							Users
						</a>
					</li>
					<!--end::Item-->
				</ul>
				<!--begin::Tab Navs-->
			</div>
			<!--end::Header Menu Wrapper-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Bottom-->
</div>
<!--end::Header-->