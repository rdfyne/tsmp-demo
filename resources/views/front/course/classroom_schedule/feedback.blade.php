@extends('front.master', ['title' => 'Application Details'])

@section('content')
	<!-- Breadcrumb Section -->
    <div class="bc2-bg">
        <div class="container bc2-content">
            <h1>Registration Feedback</h1>
        </div>
    </div>
    <!-- End -->
    <!-- Form Section -->
    <div class="main-content">
        <div class="container">
            <h1>Thank you</h1>
            <p>Thank you for registering for course <strong>{{ ucfirst($application->occurrence->course->name) }}</strong>. Our training team will contact you as soon as possible. Your registration details are as follows:</p>
            <hr/>
            <table class="table-borderless table-responsive">
                <tbody>
                    <tr>
                        <td>Course:</td>
                        <td>{{ $application->occurrence->course->name }}</td>
                    </tr>
                    <tr>
                        <td>Location:</td>
                        <td>{{ $application->occurrence->venue->name }} ({{ $application->occurrence->venue->city }}, {{ $application->occurrence->venue->country }})</td>
                    </tr>
                    <tr>
                        <td>Designation:</td>
                        <td>{{ $application->designation }}</td>
                    </tr>
                    <tr>
                        <td>Full name:</td>
                        <td>{{ $application->name }}</td>
                    </tr>
                    <tr>
                        <td>Email Address:</td>
                        <td>{{ $application->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone Number:</td>
                        <td>{{ $application->phone }}</td>
                    </tr>
                    <tr>
                        <td>Company:</td>
                        <td>{{ $application->company }}</td>
                    </tr>
                    <tr>
                        <td>Country:</td>
                        <td>{{ $application->country }}</td>
                    </tr>
                    <tr>
                        <td>Invoice:</td>
                        <td>{{ $application->invoice }}</td>
                    </tr>
                    <tr>
                        <td>Payment Method:</td>
                        <td>{{ $application->payment_method }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <a href="{{ route('front.course.show', [
                'category' => $application->occurrence->course->category,
                'course' => $application->occurrence->course,
            ]) }}" class="btn btn-danger btn-sm" id="browse-courses-btn">
                <i class="fa fa-arrow-left"></i>
                Back to course
            </a> 
        </div>
    </div>
    <!-- End -->
@endsection