@extends('front.master', ['title' => $course->name])

@section('content')
	<!-- Breadcrumb Section -->
   
      <div class="bc2-bg">
        <div class="container bc2-content">

            <h1>Register for Training</h1>
            
            <div class="crumb">
                <span><a href="https://excelldeloite.co.ke/">Home</a></span>
                <span class="bc2-gap">
                    <i class="fa fa-chevron-right"></i>
                </span>
                <span><a href="#">{{ $course->name }}</a></span>
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
            <small>* All fields are required</small>
            <hr/>
            <!-- registration inputs --> 
            <div class="card-body">
                <form action="{{ route('front.occurrence.apply', $occurrence) }}" method="POST">
                     @csrf
                    <!-- personal details -->
                    <h4>Personal information</h4>
                    <div class="reg-sec">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Full Name *</small>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Email Address* </small>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Phone Number* </small>
                                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
                                @error('name')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Your Designation* </small>
                                <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                                @error('designation')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Your Company* </small>
                                <input type="text" class="form-control" name="company" value="{{ old('company') }}">
                                @error('company')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <small class="form-text text-muted">Select Country *</small>
                                <select class="form-control" name="country">
                                    <option value="">
                                        -- Select Country --
                                    </option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}"
                                            @if (old('country') == $country)
                                                checked 
                                            @endif>
                                            {{ $country }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('country')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <input type="text" class="form-control" hidden="" name="partcipants" id="partcipants" value="">
                         <input type="text" class="form-control"  hidden="" name="total" id="total" value="">
                         <input type="text" class="form-control"  hidden="" name="perIndividual" id="perIndividual" value="">
                         <input type="text" class="form-control"  hidden="" name="tax" id="tr" value=" {{$tax}}">
                         <input type="text" class="form-control" hidden=""  name="extra" id="extra" value="{{$extra}}">
 
                             <h5>Other Participants</h5>
                            <small class="text-muted">Add the rest of the people you are attending the forum with.</small>
                            <table class="table table-sm table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="tbody">
  
                            
                            </tbody>
                        </table>
                            <div class="mt-3 form-row">
                                
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted" >Full Name </small>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group col-md-6">
                                    <small class="form-text text-muted" >Email Address </small>
                                    <input type="email" class="form-control" id="email">
                                </div>
                            </div>

                        <a class="btn btn-sm btn-main" href="#" onclick="return addPartcipants();"><span class="fa fa-user-plus"></span> Add other participant</a>

                        <div class="mt-3 form-group">
                                <h5>Require Accomodation? </h5>
                                <small class="form-text text-muted mb-3">Cost is per person. Includes training cost. </small>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked="true" onchange="return checkUser('{{$day}}')" type="radio" name="inlineRadioOptions" id="individual" value="option1">
                                    <label class="form-check-label">Day Scholar (Ksh.{{$day}} pp / ${{$day/100}} pp)</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onchange="return checkUser('{{$borders}}')" type="radio" name="inlineRadioOptions" id="organisation" value="option2">
                                    <label class="form-check-label">Full Border (Ksh.{{$borders}} pp / ${{$borders/100}}pp)</label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h5>Summary</h5>
                                <table class="table table-sm table-responsiv">
                                    <tbody>
                                        <tr>
                                            <th>Cost (x<span id="totalMembers">0</span>)</th>
                                            <td>KSh.<span id="memberPrice">0.00</span></td>
                                        </tr>
                                        <tr>
                                            <th>Tax ({{$tax}}%)</th>
                                            <td>KSh.<span id="tax">0.00</span></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>KSh.<span id="totalPrice">0.00</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        <div class="form-row">
                         <!--   <div class="form-group col-md-12">
                                <small class="form-text text-muted">Invoice* </small>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="invoice" id="individual" value="individual"
                                        @if (old('invoice', 'individual') == 'individual')
                                            checked 
                                        @endif>
                                    <label class="form-check-label">Invoice Individual</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="invoice" id="organisation" value="organization"
                                        @if (old('invoice', 'individual') == 'organization')
                                            checked 
                                        @endif>
                                    <label class="form-check-label">Invoice Organisation</label>
                                </div>
                            </div>
                             <div class="form-group col-md-12">
                                <small class="form-text text-muted">Payment Method* </small>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="eft" value="eft"
                                        @if (old('payment_method', 'eft') == 'eft')
                                            checked 
                                        @endif>
                                    <label class="form-check-label">EFT</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal"
                                        @if (old('payment_method', 'eft') == 'paypal')
                                            checked 
                                        @endif>
                                    <label class="form-check-label">Paypal</label>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="form-group col-md-12">
                                <small class="form-text text-muted">Payment Method* </small> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="#" value="individual" checked="true">
                                       
                                    <label class="form-check-label">Bank Payment Transfer</label>
                                </div>                               
                            </div>
                        </div>
                    </div> 
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="tocs" name="tocs" required>
                        <label class="tocs" for="exampleCheck1">By checking this you agree to our <a href="#sec-terms" target="_blank">Terms and Conditions</a>.</label>
                    </div>
                    <div class="reg-btn">
                        <button class="btn btn-success" type="submit">
                            Complete Registration
                        </button>
                        <button class="btn btn-sm btn-danger" type="reset">
                            <span class="fa fa-refresh">&nbsp;</span>
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
            <!-- END registration inputs --> 
            <div class="col-md-4">

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
    <!-- End -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        var allPartcipants=[];
        var price='{{$day}}';
        var skillList="";
            var i = 0;
            function addSkill(){
                var skills= document.getElementById("addSkill").value;
                if(skills != ""){
                    skillList += "<li><span name='skillItem' id='skillItem"+ i +"'>" + skills + "</span> " +
                    "<a onclick='removeSkill()'>remove</a></li>";
                    i++;
                    document.getElementById("skill").innerHTML = skillList;
                    document.getElementById("addSkill").value="";               
                }
            }
            
            function removeSkill(){
                skillList="";
                var items = document.querySelectorAll("#skill li"),index,tab = [];
                for(var j = 0; j < items.length; j++){
                    tab.push(items[j].innerHTML);
                }
                for(var j = 0; j < items.length; j++){
                    items[j].onclick = function(){
                       
                        index = tab.indexOf(this.innerHTML);
                        items[index].parentNode.removeChild(items[index]);
                        tab.pop(j,1);
                    };
                }
                

            }
            function addPartcipants(){
var name=$("#name").val();
var email=$("#email").val();
allPartcipants.push({"name":name,"email":email});
updatePrice(price);
var name=$("#name").val("");
var email=$("#email").val("");
return false;
            }

            function checkUser(price1){
price=price1;
                updatePrice(price);
               
            }
            function updatePrice(price){
                var partcipants=allPartcipants.length+1;
                var total=partcipants*price;
                var rate=(('{{$tax}}'/100)*total);
                var sumTotal=total+rate;
                $("#tax").html(rate);
                 $("#totalMembers").html(partcipants);
                  $("#totalPrice").html(sumTotal);
                   $("#memberPrice").html(total);
                   
                   $("#partcipants").val(JSON.stringify(allPartcipants));
                   $("#total").val(sumTotal);
                   $("#perIndividual").val(price);
                    var members="";
                   for (var i =  0; i <allPartcipants.length; i++) {
                       members=members+" <tr><td>"+allPartcipants[i].name+"</td><td>"+allPartcipants[i].email+"</td><td> <button type='button' onclick='removeParticipant("+i+")'>remove</button></td></tr>";
                   }

 $("#tbody").html(members);

              
            }
                function removeParticipant(i){
 allPartcipants.splice(i, 1);
 updatePrice(price);

            }


$( document ).ready(function() {
    updatePrice(price);
});
    </script>
@endsection