@component('mail::message')
#### Dear administrator

User {{ $application->designation }} {{ $application->name }} has just registered for course <b>{{ $application->occurrence->course->name }}</b>. The registration detail is as follow :

<b>Course Date:</b> {{ date('F j Y', strtotime($application->occurrence->from)) }} to {{ date('F j Y', strtotime($application->occurrence->to)) }}

<table>
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
  
</table>
@endcomponent
