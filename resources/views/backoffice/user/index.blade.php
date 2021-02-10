@extends('backoffice.master', ['title' => 'Users'])

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
								<a href="" class="text-muted">
									Users
								</a>
							</li>
						</ul>
						<!--end::Breadcrumb-->
					</div>
					<!--end::Page Heading-->
				</div>
				<!--end::Info-->
				<div class="d-flex align-items-center">
					<!--begin::Actions-->
					<a href="{{ route('backoffice.user.create') }}" class="btn btn-primary font-weight-bold my-2 my-lg-0">
						Add User
					</a>
					<!--end::Actions-->
				</div>
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
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($users as $user)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $user->name }}</td>
										<td>
											<a href="{{ route('backoffice.user.edit', $user) }}" class="btn btn-sm btn-clean btn-icon mr-2">
												<i class="flaticon2-pen text-warning"></i>
											</a>
											<a href="javascript:void()" class="btn btn-sm btn-clean btn-icon mr-2" onclick="
												event.preventDefault();
												deleteUser({{ $user->id }})">
												<i class="flaticon2-trash text-danger"></i>	
											</a>
											<form action="{{ route('backoffice.user.destroy', $user) }}" method="POST" id="delete-form-{{ $user->id }}">
												@csrf
												@method('DELETE')
											</form>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="5" class="text-center">
											No users found.
											<a href="{{ route('backoffice.user.create') }}">
												Click here to create one.
											</a>
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