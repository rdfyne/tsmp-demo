@extends('front.master', ['title' => $category->name])

@section('content')
	<!-- Breadcrumb Section -->
    <div class="bc2-bg">
        <div class="container bc2-content">

            <h1>Explore our offerings on {{ $category->name }}</h1>
            
            <div class="crumb">
                <span><a href="https://excelldeloite.co.ke/">Home</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span><a href="#">Training Courses</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span>{{ $category->name }}</span>
            </div>
        </div>
    </div>
    <!-- End -->
    <!-- course categories -->
    <div class="main-content">
        <div class="container courses">
            <div class="row">
                <div class="col-sm-8">
                    <h4>Upskill with our wide range of Training Courses</h4>
                    <div class="row">

                    <!-- listing -->
                        @forelse ($category->courses as $course)
                    <div class="single-cs">
                        <div class="row">
                                <div class="col-sm-3">
                                    <img src="{{ $course->cover_url }}" alt="{{ $course->name }}">
                                </div>
                                <div class="col-sm-9">
                                    <a href="{{ route('front.course.show', compact('category', 'course')) }}">
                                        <h4>{{ $course->name }}</h4>
                                    </a>
                                    <a class="btn btn-main" href="{{ route('front.course.show', compact('category', 'course')) }}">View Details</a>
                                </div>
                        </div>
                    </div>

                    <!-- end -->
                      @empty
                            <p>No courses available under {{ $category->name }}</p>
                      @endforelse
                    </div>
                </div>




                <div class="col-sm-4">
                     <div class="inhouse-t">

                        <h4>In-house Training</h4>
                        
                        <p>
                            Do you want to enhance and polish the existing skills of your employees or to teach new skills as per their needs?
                        </p>

                        <p>
                            Our in-house training offering is curated to help your team upskill and stay current to the fast paced changes 
                            in your industry.
                        </p>

                        <p>
                            Let us help you take the leap at your convenient time and any team size.
                        </p>

                        <a class="btn btn-main-alt-2" href="/courses/in-housetraining">Request Training</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
@endsection