<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<title></title>
	 
</head>
<body>
<P>Hello <strong> {{$name}} </strong>,<br>

Your in-house training request for  has been received.<br>

You shall be contacted shortly by one of our team members to iron out the details.<br>

Below is a summary of your application, for your reference:<br>

<h4>Your Details</h4>
Name:{{$name}}<br>
Email:{{$email}}<br>
Phone Number:{{$phone}}<br>
Company:{{$company}}<br>
Designation:{{$designation}}<br>
Country:{{$country}}<br>
Number of People:{{$people}}<br>
Preferred Date of training:{{$date}}

 </P>
</body>
</html>