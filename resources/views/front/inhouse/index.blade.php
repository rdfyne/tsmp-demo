@extends('front.master', ['title' => "In-House Regsitartion"])

@section('content')

   <!-- Breadcrumb Section -->
   <div class="bc2-bg">
        <div class="container bc2-content">

            <h1>Register for in-house Training</h1>
            
            <div class="crumb">
                <span><a href="#">Home</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span><a href="#">In-house Training</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span>Register</span>
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Form Section -->
    <div class="main-content">
        <div class="container">

        <div class="row">
            <div class="col-sm-8">
                
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
                <h3>Register for in-house training</h3>
                <small>* All fields are required</small>
                <hr/>
                    
                <!-- registration inputs --> 
                <div class="card-body">
                    <form method="post" action="register" id="f">
                        {{csrf_field()}}
                        <!-- personal details -->
                        <h4>Personal information</h4>
                        <div class="reg-sec">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Select Category</small>
                                    <select class="form-control" name="category_id" id="cat" onchange="return hello()">
                                        <option>-- Select Category --</option>
                                        @foreach((json_decode($courses))->categories as $op)
                                        <option  value="{{$op->id}}">{{$op->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Select Training Course</small>
                                    <select class="form-control" id="course" name="course_id">
                                        <option>-- Select Course --</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Or specify your preffered course </small>
                                    <input type="text" class="form-control" name="preferred">
                                  
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Target Group</small>
                                    <input type="text" class="form-control" name="group">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted" >Full Name *</small>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted" >Email Address* </small>
                                    <input type="text" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Phone Number* </small>
                                    <input type="tel" class="form-control" name="phone">
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted" >Your Designation* </small>
                                    <input type="text" class="form-control" name="designation">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Your Company* </small>
                                    <input type="text" class="form-control" name="company">
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Select Country *</small>
                                    <select class="form-control" name="country">
                                        <option>-- Select Country --</option>
                                        <option value="1">Kenya</option>
                                        <option value="2">Ethiopia</option>
                                        <option value="3">Tanzania</option>
                                        <option value="4">Zambia</option>
                                        <option value="5">Malawi</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Number of people* </small>
                                    <input type="text" class="form-control" name="people">
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted">Preferred date*</small><!-- this will be a date picker// you can not ick past dates -->
                                     <input type="date" class="form-control" name="date">
                                </div>
                            </div>

                        </div>


                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="tocs">
                            <label class="tocs" for="exampleCheck1">By checking this you agree to our <a href="#sec-terms" target="_blank">Terms and Conditions</a>.</label>
                        </div>

                        <div class="reg-btn">
                            <a class="btn btn-main" onclick="return submitForm();" href="#">Complete Request</a>
                            <a class="btn btn-sm btn-danger" href="#"><span class="fa fa-refresh">&nbsp;</span>Reset</a>
                        </div>
                        
                    </form>

                </div>
                <!-- END registration inputs --> 
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

                    <a class="btn btn-main-alt-2" href="tsmp-demo/public/in-housetraining">Request Training</a>

                </div>
            </div>

        </div>

        </div>
   
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- End -->
    <script type="text/javascript">
  var p1=[];      
$( document ).ready(function() {
var p='{{$courses}}';
 p1=JSON.parse(p.replace(/&quot;/g,'"'));


var section=$("#cat");


});
function submitForm(){
   $("#f").submit(); 
}
function hello(){
    var p='{{$courses}}';
    
 var p1=JSON.parse(p.replace(/&quot;/g,'"'));
 var s1=p1['courses'];

    var s="";
    var s2=$( "#cat" ).val();

for (var i = s1.length - 1; i >= 0; i--) {
    var s2=$( "#cat" ).val();

    if(s2==s1[i]['category_id']){
   s=s+" <option value='"+s1[i]['id']+"'>"+s1[i]['name']+"</option>";}
}
$("#course").html(s);
}


    </script>
@endsection