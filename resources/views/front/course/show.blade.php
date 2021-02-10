@extends('front.master', ['title' => $course->name])

@section('content')
    <!-- Breadcrumb Section -->   
        <div class="bc2-bg">
        <div class="container bc2-content">

            <h1>{{ $course->name }}</h1>
            
            <div class="crumb">
                <span><a href="https://excelldeloite.co.ke/">Home</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span><a href="#">{{ $category->name }}</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span><a href="{{ route('front.course.show', compact('category', 'course')) }}">{{ $course->name }}</a></span>
            </div>
        </div>
    </div>
    <!-- course categories -->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="course-desc">
                        <img src="{{ $course->cover_url }}" alt="{{ $course->name }}">
                        <h2>{{ $course->name }}</h2>
                        <p>{!! $course->description !!}</p>
                    </div>
                    <div class="social-share">
                        <hr/>
                        <h5>Share this course:</h5>
                        <div class="social-share">
                            <a href="http://www.facebook.com/sharer.php?u={{ route('front.course.show', compact('category', 'course')) }}" target="_blank">
                                <span class="fa fa-facebook"></span>
                            </a>
                            <a href="https://twitter.com/share?url={{ route('front.course.show', compact('category', 'course')) }}" target="_blank">
                                <span class="fa fa-twitter"></span>
                            </a>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ route('front.course.show', compact('category', 'course')) }}" target="_blank">
                                <span class="fa fa-linkedin"></span>
                            </a>
                            <a href="mailto:?Subject={{ $course->name }}&amp;Body={{ $course->name }} {{ route('front.course.show', compact('category', 'course')) }}" target="_blank">
                                <span class="fa fa-envelope-o"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card-body">
                        <h4>Virtual Training Schedule</h4>
                        <table class="table table-sm table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Apply</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course->online_occurrences as $occur)
                                    <tr>
                                        <td>
                                            {{ date('M j, Y', strtotime($occur->from)) }}
                                        </td>
                                        <td>
                                            {{ date('M j, Y', strtotime($occur->to)) }}
                                        </td>
                                        <td>
                                            {{ date('M j, Y', strtotime($occur->booking_end)) }}
                                        </td>
                                        <td>
                                            Ksh{{ number_format($occur->kes_cost) }}
                                        </td>
                                        <td>
                                             <?php $occurrence=$occur->id; ?>
                                          <a href="{{ route('front.online_occurrence.form', compact('course', 'occurrence')) }}?startdate= {{ date('M j, Y', strtotime($occur->from)) }} & enddate={{ date('M j, Y', strtotime($occur->booking_end)) }}" class="btn btn-success btn-sm">
                                                Register
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <h4>Classroom Training Schedule</h4>
                        <table class="table table-sm table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Deadline</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Apply</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($course->occurrences as $occurrences)
                                    <tr>
                                        <td>
                                            {{ date('M j, Y', strtotime($occurrences->from)) }}
                                        </td>
                                        <td>
                                            {{ date('M j, Y', strtotime($occurrences->to)) }}
                                        </td>
                                        <td>
                                            {{ date('M j, Y', strtotime($occurrences->booking_end)) }}
                                        </td>
                                        <td>
                                            @if(isset($occurrences->venue)){{$occurrences->venue}} @else notset @endif
                                        </td>
                                        <td>
                                            Ksh{{ number_format($occurrences->kes_cost_scholar) }}
                                        </td>
                                        <td>
                                            <?php $occurrence=$occurrences->id; ?>
                                              <a href="{{ route('front.occurrence.form', compact('course', 'occurrence')) }}?startdate= {{ date('M j, Y', strtotime($occur->from)) }} & enddate={{ date('M j, Y', strtotime($occur->booking_end)) }} & location={{$occurrences->venue}}" class="btn btn-success btn-sm">
                                                Register
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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