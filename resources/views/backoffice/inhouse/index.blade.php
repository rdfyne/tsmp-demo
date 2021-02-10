@extends('backoffice.master', ['title' => 'Inhouse Training'])

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
								<a href="" class="text-muted">
									Webmail
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
						<table class="table table-separate table-head-custom table-checkable" id="users-table">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Course</th>

									<th>company</th>
									<th>Phone</th>
									<th>Email</th><th>No People</th>
									<th>Date</th>
									
								</tr>
							</thead>
							<tbody>
								
								@foreach( $data as $dat)
								<tr>
									<td>{{$dat->id}}</td>
									<td>{{$dat->name}}</td>
									<td>{{$dat->course_name}}</td>
									<td>{{$dat->company}}</td>
									<td>{{$dat->phone}}</td>
									<td>{{$dat->email}}</td>
									<td>{{$dat->people}}</td>
									<td>
                                        {{ date('M j, Y', strtotime($dat->date)) }}
                                     </td>
								</tr>
								@endforeach
							
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

@push('script')
	<script src="{{ asset('backoffice/plugins/custom/datatables/datatables.bundle.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready( function ($) {
			$('#users-table').DataTable({
	            scrollX: true,
	            columnDefs: [
	            	{
	            		targets: -1,
	            		orderable: false,
	            	}
	            ]
	        })
		})
		function deleteUser(id) {
			event.preventDefault()
			Swal.fire({
				title: 'Are you sure to delete user',
		        icon: 'warning',
		        showCancelButton: true,
		        confirmButtonColor: '#3085d6',
		        cancelButtonColor: '#d33',
		        confirmButtonText: 'Yes',
		        allowOutsideClick: false,
		        showLoaderOnConfirm: true,
		        preConfirm: () => new Promise( function () {
		        	document.getElementById(`delete-form-${id}`).submit()
		        })
			})
		}
	</script>
@endpush