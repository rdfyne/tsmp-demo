@extends('backoffice.master', ['title' => "Classroom Schedule | {$occurrence->course->name} "])

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
								<a href="{{ route('backoffice.course.index') }}" class="text-muted">
									Courses
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="{{ route('backoffice.course.show', $occurrence->course) }}" class="text-muted">
									{{ $occurrence->course->name }}
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="{{ route('backoffice.course.show', $occurrence->course) }}" class="text-muted">
									Classroom Training Schedule
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
				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-body">
						<!--begin: Datatable-->
						<table class="table table-separate table-head-custom table-checkable" id="applications-table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Designation</th>
									<th>Company</th>
									<th>Country</th>
									<th>Invoice</th>
									<th>Payment Method</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($occurrence->applications as $application)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $application->name }}</td>
										<td>{{ $application->email }}</td>
										<td>{{ $application->phone }}</td>
										<td>{{ $application->designation }}</td>
										<td>{{ $application->company }}</td>
										<td>{{ $application->country }}</td>
										<td>{{ $application->invoice }}</td>
										<td>
											{{ $application->payment_method }}
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="9" class="text-center">
											No application is avaialable.
										</td>
									</tr>
								@endforelse
							</tbody>
						</table>
						<!--end: Datatable-->
					</div>
				</div>
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
@endsection