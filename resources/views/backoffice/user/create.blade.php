@extends('backoffice.master', ['title' => 'Add User'])

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
								<a href="{{ route('backoffice.user.index') }}" class="text-muted">
									Users
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">
									Add User
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
				<form class="card form" action="{{ route('backoffice.user.store') }}" method="POST">
					@csrf
					<div class="card-body">
						<div class="form-group row mt-4">
							<label  class="col-3 col-form-label">
								Name:
							</label>
							<div class="col-9">
								<input type="text" name="name" class="form-control form-control-solid" placeholder="Enter Full Name" value="{{ old('name') }}" />
								@include('backoffice.partials.error', ['field' => 'name'])
							</div>
						</div>
						<div class="form-group row mt-4">
							<label  class="col-3 col-form-label">
								Email:
							</label>
							<div class="col-9">
								<input type="email" name="email" class="form-control form-control-solid" placeholder="Enter Email" value="{{ old('email') }}" />
								@include('backoffice.partials.error', ['field' => 'email'])
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3 col-form-label">
								Role:
							</label>
							<div class="col-9">
								<select name="role" class="form-control form-control-solid">
									<option>admin</option>
								</select>
								@include('backoffice.partials.error', ['field' => 'role'])
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