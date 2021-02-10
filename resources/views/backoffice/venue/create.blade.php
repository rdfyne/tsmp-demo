@extends('backoffice.master', ['title' => 'Add Venue'])

@section('content')
	<!--begin::Content-->
	<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
		<!--begin::Subheader-->
		<div class="subheader py-2 py-lg-6 subheader-transparent" id="kt_subheader">
			<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
				<!--begin::Info-->
				<div class="d-flex align-items-center flex-wrap mr-1">
					<!--begin::Page Heading-->
					<div class="d-flex align-items-baseline flex-wrap mr-5">
						<!--begin::Breadcrumb-->
						<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item">
								<a href="{{ route('backoffice.home') }}" class="text-muted">
									home
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="{{ route('backoffice.venue.index') }}" class="text-muted">
									Venues
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">
									Add Venue
								</a>
							</li>
						</ul>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Page Heading-->
				</div>
				<!--end::Info-->
			</div>
		</div>
		<!--end::Subheader-->
		<!--begin::Entry-->
		<div class="d-flex flex-column-fluid">
			<!--begin::Container-->
			<div class="container">
				@include('backoffice.partials.alert')
				<form class="card form" action="{{ route('backoffice.venue.store') }}" method="POST">
					@csrf
					<div class="card-body">
						<div class="form-group row mt-4">
							<label  class="col-3 col-form-label">
								Name:
							</label>
							<div class="col-9">
								<input type="text" name="name" class="form-control form-control-solid" placeholder="Enter Venue Name" value="{{ old('name') }}" />
								@include('backoffice.partials.error', ['field' => 'name'])
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-3 col-form-label">
								Country:
							</label>
							<div class="col-9">
								<input type="text" name="country" class="form-control form-control-solid" placeholder="Enter Country" value="{{ old('country') }}" />
								@include('backoffice.partials.error', ['field' => 'country'])
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-3 col-form-label">
								City:
							</label>
							<div class="col-9">
								<input type="text" name="city" class="form-control form-control-solid" placeholder="Enter City" value="{{ old('city') }}" />
								@include('backoffice.partials.error', ['field' => 'city'])
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col text-left">
								<button type="submit" class="btn btn-primary mr-2">
									Submit
								</button>
							</div>
							<div class="col text-right">
								<button type="reset" class="btn btn-danger">	Reset
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
@endsection