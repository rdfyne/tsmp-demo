@extends('backoffice.master', ['title' => 'Edit Course'])

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
									Edit Course
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
				<form class="card form" id="course-form" action="{{ route('backoffice.course.update', $course) }}" method="POST" @submit="save" enctype="multipart/form-data">
					@csrf
                    @method('PUT')
					<div class="card-body">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name', $course->name) }}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <input type="number" class="form-control" placeholder="Position" name="position" value="{{ old('position', $course->position) }}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" name="category_id" id="category_id" required>
                                    <option value="">-- Select Main Category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" name="otherCategories[]" id="otherCategories" multiple>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $course->otherCategories->contains('id', $category->id) ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="enable_online_booking" id="enable-online-booking" class="filled-in chk-col-red" @change="toggleOnlineOccurrence" value="checked"
                            @if ( old('enable_online_booking', $course->onlineOccurrences ? 'checked' : null) == "checked" )
                                checked
                            @endif>

                            <label for="enable-online-booking">
                                Enable online booking
                            </label>
                            <hr><br>
                        </div>
                        <!-- Online Occurrence -->
                        <div id="online-occurrence"
                        @if ( old('enable_online_booking', $course->onlineOccurrences ? 'checked' : null) !== "checked")
                            style="display: none"
                        @endif>
                            <h4>Set Online Occurrence</h4>
                            <p v-for="(occurrence, index) in onlineOccurrences" :key="index">
                                <strong>from:</strong> <i>@{{ occurrence.from }}</i>
                                &nbsp;
                                <strong>to:</strong> <i>@{{ occurrence.to }}</i>
                                &nbsp;
                                <button type="button" @click="removeOnlineOccurrence(index)">remove</button>
                            </p>
                            @foreach($course->onlineOccurrences as $occurrence)
                                <p>
                                    <strong>from:</strong> <i>{{ $occurrence->from }}</i>
                                    &nbsp;
                                    <strong>to:</strong> <i>{{ $occurrence->to }}</i>
                                    &nbsp;
                                    <button type="button" onclick="document.getElementById(`{{ 'delete-online-occurrence-' . $occurrence->id }}`).submit()">remove</button>
                                </p>
                            @endforeach
                            <div class="dates" id="online-occurrence-form">
                                <div class="form-group">
                                    <label>From</label>
                                    <div class="form-line">
                                        <input type="date" class="form-control" placeholder="Date start..." name="from" min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>To</label>
                                    <div class="form-line">
                                        <input type="date" class="form-control" placeholder="Date end..." name="to" min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Kenyan Cost (KES)" name="kes_cost"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Non Kenyan Cost ($)" name="usd_cost"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" placeholder="Taxation" name="tax"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Booking Ends</label>
                                    <div class="form-line">
                                        <input type="date" class="form-control" placeholder="Date end..." name="booking_end" min="{{ date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div>
                                    <a @click="addOnlineOccurrence" class="btn btn-success">
                                        Add Online Occurrence
                                    </a>
                                </div>
                            </div>
                            <hr><br>
                        </div>
                        <!-- Dates -->
                        <h4>Set Occurrence</h4>
                        <p v-for="(occurrence, index) in occurrences" :key="index">
                            <strong>from:</strong> <i>@{{ occurrence.from }}</i>
                            &nbsp;
                            <strong>to:</strong> <i>@{{ occurrence.to }}</i>
                            &nbsp;
                            <strong>Venue:</strong> <i>@{{ venues.find(venue => venue.id == occurrence.venue_id).name }}</i>
                            &nbsp;
                            <button type="button" @click="removeOccurrence(index)">remove</button>
                        </p>
                        @foreach($course->occurrences as $occurrence)
                            <p>
                                <strong>from:</strong> <i>{{ $occurrence->from }}</i>
                                &nbsp;
                                <strong>to:</strong> <i>{{ $occurrence->to }}</i>
                                &nbsp;
                                <strong>Venue:</strong> <i>{{ $occurrence->venue->name }}</i>
                                &nbsp;
                                <button type="button" onclick="document.getElementById(`{{ 'delete-occurrence-' . $occurrence->id }}`).submit()">remove</button>
                            </p>
                        @endforeach
                        <div class="dates" id="occurrence-form">
                            <div class="form-group">
                                <label>From</label>
                                <div class="form-line">
                                    <input type="date" class="form-control" placeholder="Date start..." name="from" min="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>To</label>
                                <div class="form-line">
                                    <input type="date" class="form-control" placeholder="Date end..." name="to" min="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                <select class="form-control show-tick" name="venue_id">
                                    <option value="">-- Select Venue --</option>
                                    <option v-for="(venue, index) in venues" :key="index" :value="venue.id">
                                        @{{ `${venue.name}, ${venue.city}` }}
                                    </option>
                                </select>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    
                            <label>Full Border (optional)</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" placeholder="Kenyan cost (KES)" name="kes_cost"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" placeholder="Non Kenyan cost ($)" name="usd_cost"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" placeholder="Taxation" name="tax"/>
                                </div>
                            </div>
                                </div>
                                <div class="col-md-6">
                                    

                             <label>Day Scholar <span style="color: red">*</span></label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" placeholder="Kenyan cost (KES)" name="kes_cost_scholar" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" placeholder="Non Kenyan cost ($)" name="usd_cost_scholar" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="number" class="form-control" placeholder="Taxation" name="tax_scholar"  />
                                </div>
                            </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label>Booking Ends</label>
                                <div class="form-line">
                                    <input type="date" class="form-control" placeholder="Date end..." name="booking_end" min="{{ date('Y-m-d') }}">
                                </div>
                            </div>                        
                            <div>
                                <a @click="addOccurrence" class="btn btn-success">Add Occurrence</a>
                            </div>
                            <hr><br>
                        </div>
                        <!-- End Dates -->                        
                        <div class="form-group">
                            <label>Select Cover Image</label>
                            <div class="form-line">
                                <input type="file" class="form-control" name="cover" accept="image/*"/>
                            </div>
                        </div>
                        <!-- Description -->
                        <label>Add Description</label>
                        <div class="">
                            <textarea name="description" id="description">{!! $course->description !!}</textarea>
                        </div>
                        <!-- End -->               
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
				<!--end::Card-->
			</div>
			<!--end::Container-->
		</div>
		<!--end::Entry-->
	</div>
	<!--end::Content-->
@endsection

@push('script')
    <script src="{{ asset('vendor/vue@2.js') }}"></script>
    <script>
        jQuery(document).ready( function ($) {
            $('#description').summernote({
                height: 200
            })

            $('#otherCategories').select2({
                placeholder: "Other Categories",
            })
        })

        new Vue({
            el: '#course-form',

            data: () => ({

                occurrences: [],
                onlineOccurrences: [],
                venues: @json($venues)
            }),

            methods: {

                save() {

                    jQuery(`<input type="hidden" name="occurrences" value="${this.occurrences.map(occurrence => Object.entries(occurrence).map(([key, entry]) => `${key}:${entry}`)).join('|')}"/>`).appendTo('#course-form');

                    jQuery(`<input type="hidden" name="online_occurrences" value="${this.onlineOccurrences.map(occurrence => Object.entries(occurrence).map(([key, entry]) => `${key}:${entry}`)).join('|')}"/>`).appendTo('#course-form');

                    return true;
                },

                addOnlineOccurrence() {

                    const from = jQuery('#online-occurrence-form input[name="from"]').val() || "{{ now()->format('Y-m-d') }}";

                    const to = jQuery('#online-occurrence-form input[name="to"]').val() || "{{ now()->format('Y-m-d') }}";

                    if ( Date.parse(from) >= Date.parse(to) ) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '`From date (${from}) cannot be equal to or greater than To date (${to})`'
                        });

                        return;
                    }

                    const booking_end = jQuery('#online-occurrence-form input[name="booking_end"]').val() || "{{ now()->format('Y-m-d') }}";

                    if ( Date.parse(booking_end) >= Date.parse(from) ) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: `Booking End date (${booking_end}) cannot be equal to or greater than From date (${from})`
                        });

                        return;
                    }

                    const newOccurrence = {
                        
                        from, to, booking_end,
                        kes_cost: jQuery('#online-occurrence-form input[name="kes_cost"]').val() || 0,
                        usd_cost: jQuery('#online-occurrence-form input[name="usd_cost"]').val() || 0,
                        tax: jQuery('#online-occurrence-form input[name="tax"]').val() || 0,
                    }

                    this.onlineOccurrences.unshift(newOccurrence);

                    Object.keys(newOccurrence).forEach(key => jQuery(`#online-occurrence-form input[name="${key}"]`).val(''));
                },

                removeOnlineOccurrence(id) {

                    this.onlineOccurrences = this.onlineOccurrences.filter((occurrence, index) => index != id);
                },

                addOccurrence() {

                    const from = jQuery('#occurrence-form input[name="from"]').val() || "{{ now()->format('Y-m-d') }}";

                    const to = jQuery('#occurrence-form input[name="to"]').val() || "{{ now()->format('Y-m-d') }}";

                    if ( Date.parse(from) >= Date.parse(to) ) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: `From date (${from}) cannot be equal to or greater than To date (${to})`
                        });

                        return;
                    }

                    const booking_end = jQuery('#occurrence-form input[name="booking_end"]').val() || "{{ now()->format('Y-m-d') }}";

                    if ( Date.parse(booking_end) >= Date.parse(from) ) {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: `Booking End date (${booking_end}) cannot be equal to or greater than From date (${from})`
                        });

                        return;
                    }

                    const newOccurrence = {

                        from, to, booking_end,
                        venue_id: jQuery('#occurrence-form select[name="venue_id"]').val(),
                        kes_cost: jQuery('#occurrence-form input[name="kes_cost"]').val() || 0,
                        usd_cost: jQuery('#occurrence-form input[name="usd_cost"]').val() || 0,
                        tax: jQuery('#occurrence-form input[name="tax"]').val() || 0

                         kes_cost_scholar: jQuery('#occurrence-form input[name="kes_cost_scholar"]').val() || 0,
                        usd_cost_scholar: jQuery('#occurrence-form input[name="usd_cost_scholar"]').val() || 0,
                        tax_scholar: jQuery('#occurrence-form input[name="tax_scholar"]').val() || 0
                    }

                    this.occurrences.unshift(newOccurrence);

                    Object.keys(newOccurrence).forEach(key => jQuery(`#occurrence-form input[name="${key}"]`).val(''));
                },
                
                removeOccurrence(id) {
                    this.occurrences = this.occurrences.filter((occurrence, index) => index != id);
                },

                /**
                 * show or hide online occurrence fields
                 **/
                 toggleOnlineOccurrence() {
                    jQuery('#online-occurrence').fadeToggle();
                }
            }
        });
    </script>
@endpush

@push('style')
    <style type="text/css">
        #online-occurrence-form, #occurrence-form {
            margin: 20px 0;
        }
    </style>
@endpush