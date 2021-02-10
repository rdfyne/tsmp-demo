@extends('backoffice.master', ['title' => 'Edit Category'])

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
								<a href="{{ route('backoffice.category.index') }}" class="text-muted">
									Categories
								</a>
							</li>
							<li class="breadcrumb-item">
								<a href="" class="text-muted">
									Edit Category
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
				<form class="card form" action="{{ route('backoffice.category.update', $category) }}" method="POST" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="card-body">
						<div class="form-group row mt-4">
							<label  class="col-3 col-form-label">
								Name:
							</label>
							<div class="col-9">
								<input type="text" name="name" class="form-control form-control-solid" placeholder="Enter Category Name" value="{{ old('name', $category->name) }}" />
								@include('backoffice.partials.error', ['field' => 'name'])
							</div>
						</div>
						<div class="form-group row">
							<label  class="col-3 col-form-label">
								Cover Image:
							</label>
							<div class="col-9">
								<input type="file" name="cover" class="form-control form-control-solid" />
								@include('backoffice.partials.error', ['field' => 'cover'])
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3 col-form-label">
								Featured Courses:
							</label>
                            <div class="col-9">
                                <select class="form-control" name="courses[]" multiple>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" @if(in_array($course->id, old('courses', $category->featuredCourses->pluck('id')->all()))) selected @endif>
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
						<div class="form-group row">
							<label  class="col-3 col-form-label">
								Description:
							</label>
							<div class="col-9">
								<textarea name="description" class="form-control form-control-solid" placeholder="Enter Description" rows="8">{{ old('description', $category->description) }}</textarea>
								@include('backoffice.partials.error', ['field' => 'description'])
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
								<button type="reset" class="btn btn-danger">
									Reset
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

@push('script')
	<script type="text/javascript">
		jQuery(document).ready( function ($) {
			$('[name="courses[]"]').select2({
                placeholder: "Select Featured Courses",
            })
		})
	</script>
@endpush