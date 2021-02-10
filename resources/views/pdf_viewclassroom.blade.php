<!DOCTYPE html>
<html>
<head>
	<title></title>
	    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="  col-md-6">
               <a href="index.php">
                   <img src="{{ asset('front/img/web-logo.png') }}" class="img-responsive fluid w-100" style="height: 80px; ">
                </a>
             </div>

			<div  class="col-md-6">
				<p style="float: right;">
					Kikinga House, 3rd Floor, Suite 302,<br>
					Biashara Street, Kiambu<br>
					(+254) 724 599 644 / (+254) 794 588 156 / (+254) 101 588 156<br>
					info@excelldeloite.co.ke or excelldeloiteconsulting@gmail.com
				</p>
			</div>
		</div>
		</div>
	</section>

		<section>
		<div class="container">
			<div  style="margin-top: 150px !important;">
				<h4>Invoice No: <strong>#EC0{{$id}}21</strong>			
				</h4>
				Date:<strong> {{$date}}</strong>
				<h4>Invoiced to:</h4>
				<p>	
				 {{$company}}<br>
				 {{$email}}<br>
				 {{$country}}<br>
				</p>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row">

			<div  class="col-md-12">
				<table class="table table-sm   w-100 " style="border-collapse: collapse; width: 100%; border: 1px solid grey" border="1">
                            <thead>
                                <tr>
                                    <th >Description</th>
                                    <th >Total Amount (ksh)</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <tr>
                                        <td>
                                         <p class="text-center" style="text-align: center;">Payments for the Classrom training application</p>
                                        </td>
                                        <td>
                                          {{$total}}/=
                                        </td>
                                        
                                     </tr>
                             
                            </tbody>
                        </table>
			</div>
		</div>
		</div>
	</section>


	<section>
		<div class="container">
			<div class="row">

			<div  class="col-md-12">
				<table class="table table-sm  w-100 " style="border-collapse: collapse; width: 50%; border: 1px solid grey; margin-top: 20px;" border="1">
                            <thead>
                                <tr>
                                    <th >Bank Details</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <tr>
                                        <td>
                                         <p class="text-center" style="text-align: left;">
                                         	A/C Name Excelldeloite Consulting Group Ltd<br>
                                         	Bank:Cooperative Bank<br>
                                         	A/c No.01192678577100<br>
                                         Branch-Kiambu</p>
                                        </td>
                                      
                                     </tr>
                             
                            </tbody>
                        </table>
			</div>
		</div>
		</div>
	</section>

</body>
</html>