@extends('front.master', ['title' => 'Home'])

@section('content')
	<!-- Breadcrumb Section -->
       <!-- Breadcrumb Section -->
    <div class="bc2-bg">
        <div class="container bc2-content">
            <h1>Training Courses</h1>
            <div class="crumb">
                <span><a href="https://excelldeloite.co.ke/">Home</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span>Training Courses</span>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- End -->
    <!-- course categories -->
    <div class="main-content">
        <div class="container courses">
             <h4 class="mb-4">We offer a wide range of training courses spanning across various categories, industries and sectors. Upskill yourself 
                or your team today.</h4>
            <div class="row">
                @forelse ($categories as $category)
                    <div class="col-sm-4">
                        <a href="{{ route('front.category.show', $category) }}">
                            <div class="single-cat">
                                <img src="{{ $category->cover_url }}" alt="{{ $category->name }}">
                                <h5>{{ $category->name }}</h5>
                                <a class="btn btn-sm btn-main" href="{{ route('front.category.show', $category) }}">View Courses</a>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-sm-12 text-center">
                        <h4>No categories available</h4>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- End -->
@endsection