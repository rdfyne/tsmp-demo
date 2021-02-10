<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title></title>
	 
</head>
<body>
<P>Dear <strong>{{$name}},</strong> <br>

	You have successfully registered for <strong>{{$course_name}} </strong> happening on From <strong>{{$startdate}}</strong> to <strong>{{$enddate}}</strong><br>

	Location:<strong> @if($location != null) {{$location}} @else Virtual @endif </strong><br>

	Your total cost of training is KSh.<strong>{{$total}}</strong><br>

	Kindly pay to the following bank details:<br>
	<h4>

	A/C Name Excelldeloite Consulting Group Ltd<br>

	Bank:Cooperative Bank <br>

	A/c No.01192678577100<br>

	Branch-Kiambu<br>

   </h4>


   Below is a summary of your application, for your reference:<br>

   <h4>Your Details</h4>
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
			{{$perIndividual}}</tr>
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