@extends('backoffice.master', ['title' => $course->name])

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
								<a href="" class="text-muted">
									{{ $course->name }}
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
						<ul class="nav nav-tabs nav-tabs-line">
						    <li class="nav-item">
						        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">
						        	Classroom Training Schedule
						        </a>
						    </li>
						    <li class="nav-item">
						        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">
						        	Virtual Training Schedule
						        </a>
						    </li>
						</ul>
						<div class="tab-content mt-5" id="myTabContent">
							<div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1">
								<!--begin: Datatable-->
								<table class="table table-separate table-head-custom table-checkable" id="classroom-table">
									<thead>
										<tr>
											<th>No.</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Location</th>
											<th>Cost</th>
											<th>Tax</th>
											<th>Registrants</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($course->occurrences as $occurrence)
											<tr>
												<td>
													{{ $loop->iteration }}
												</td>
												<td>
													{{ date('F j Y', strtotime($occurrence->from)) }}
												</td>
												<td>
													{{ date('F j Y', strtotime($occurrence->to)) }}
												</td>
												<td>
													{{ $occurrence->location }}
												</td>
												<td>
													{{ number_format($occurrence->kes_cost) }}
												</td>
												<td>
													{{ intval($occurrence->tax) }}
												</td>
												<td>
													{{ $occurrence->applications()->count() }}
												</td>
												<td>
													<a href="{{ route('backoffice.classroom_schedule', $occurrence) }}" class="btn btn-sm btn-clean btn-icon mr-2 text-info">
														<i class="flaticon-eye"></i>
													</a>
												</td>
											</tr>
										@empty
											<tr>
												<td colspan="8" class="text-center">
													No classroom schedule is available for this course.
												</td>
											</tr>
										@endforelse
									</tbody>
								</table>
								<!--end: Datatable-->
							</div>
							<div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2">
								<!--begin: Datatable-->
								<table class="table table-separate table-head-custom table-checkable" id="virtual-table">
									<thead>
										<tr>
											<th>No.</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Cost</th>
											<th>Tax</th>
											<th>Registrants</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										@forelse ($course->onlineOccurrences as $occurrence)
											<tr>
												<td>
													{{ $loop->iteration }}
												</td>
												<td>
													{{ date('F j Y', strtotime($occurrence->from)) }}
												</td>
												<td>
													{{ date('F j Y', strtotime($occurrence->to)) }}
												</td>
												<td>
													{{ number_format($occurrence->kes_cost) }}
												</td>
												<td>
													{{ intval($occurrence->tax) }}
												</td>
												<td>
													{{ $occurrence->applications()->count() }}
												</td>
												<td>
													<a href="{{ route('backoffice.virtual_schedule', $occurrence) }}" class="btn btn-sm btn-clean btn-icon mr-2 text-info">
														<i class="flaticon-eye"></i>
													</a>
												</td>
											</tr>
										@empty
											<tr>
												<td colspan="7" class="text-center">
													No classroom schedule is available for this course.
												</td>
											</tr>
										@endforelse
									</tbody>
								</table>
								<!--end: Datatable-->
							</div>
						</div>
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