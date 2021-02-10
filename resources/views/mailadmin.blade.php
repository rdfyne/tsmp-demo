<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title></title>
	 
</head>
<body>
<P>Hello,<br>

 You have received a new registration for  <strong> {{$course_name}} </strong> happening on From <strong>{{$startdate}}</strong> to <strong>{{$enddate}}</strong><br>

	Location: <strong> @if($location != null) {{$location}} @else Virtual @endif </strong> <br>

	Your total cost of training is KSh.<strong>{{$total}}</strong><br>

	Kindly follow up with the client to confirm payment.<br>

    Below is a summary of their application, for your reference:<br>


   <h4>Client Details</h4>
   Name: {{$name}}<br>
   Email: {{$email}}<br>
   Phone Number: {{$phone}}<br>
   Company:{{$company}}<br>
   Designation:{{$designation}}<br>
   Country:{{$country}}<br>

 </P>

 <h4>Other Applicants</h4>
<table class="table"> 
	<thead >
	<th>Name</th>
	<th>Email</th>
	<th>Cost per individual (ksh)</th>
	</thead>
		<tbody>
			<?php $totalPrice=0; ?>
			<tr>
				<td>{{$name}}</td>
				<td>{{$email}}</td>
			<?php $totalPrice=$totalPrice+$perIndividual; ?>
			@foreach($data as $dat)
			<tr>
				<td>{{$dat->name}}</td>
				<td>{{$dat->email}}</td>
				<td>{{$perIndividual}}</td>
			</tr>
			<?php $totalPrice=$totalPrice+$perIndividual; ?>
			@endforeach
			</tbody>
</table>
</body>
</html>