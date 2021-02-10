@if (session()->has('success'))
	<div class="alert alert-custom alert-notice alert-light-success fade show" role="alert">
	    <div class="alert-icon">
	    	<i class="flaticon2-checkmark"></i>
	    </div>
	    <div class="alert-text">
	    	{{ session()->get('success') }}
	    </div>
	    <div class="alert-close">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true"><i class="ki ki-close"></i></span>
	        </button>
	    </div>
	</div>
@elseif (session()->has('error'))
	<div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
	    <div class="alert-icon">
	    	<i class="flaticon2-warning"></i>
	    </div>
	    <div class="alert-text">
	    	{{ session()->get('error') }}
	    </div>
	    <div class="alert-close">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	            <span aria-hidden="true"><i class="ki ki-close"></i></span>
	        </button>
	    </div>
	</div>
@endif