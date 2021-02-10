<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineOccurrence;
use App\Models\Course;
use App\Models\VirtualTrainingApplication;
use App\Http\Requests\Front\Course\VirtualTrainingApplicationRequest;
use App\Mail\VirtualTrainingApplicationMail;
use Mail;
use Schema;
use App\Models\inone;

class VirtualScheduleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @param  \App\Models\OnlineOccurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function form(Course $course, OnlineOccurrence $occurrence,Request $request)
    {
         $array=Array("id"=>$occurrence->id);
        $costs=inone::getPrice($array);      
        $fullborderKsh=$costs[0]->kes_cost;      
        $borders=$fullborderKsh;
        $dayscholartax =$costs[0]->tax;
        $tax=$dayscholartax; 
        $startdate= $request->input("startdate");
        $enddate= $request->input("enddate");
        $location= $request->input("location");
        $course_name=$course->name;
        $extra=Array("startdate"=>$startdate,"enddate"=>$enddate,"course_name"=>$course_name,"location"=>$location);
        $extra=json_encode($extra);

        return view('front.course.virtual_schedule/form', compact('occurrence', 'course','borders','tax','extra'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Front\Course\VirtualTrainingApplicationRequest  $request
     * @param  \App\Models\OnlineOccurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function application(VirtualTrainingApplicationRequest $request, OnlineOccurrence $occurrence)
    {

$dat=json_decode(($request->only("partcipants"))['partcipants']);
$total=($request->only("total"))['total'];
$perIndividual=($request->only("perIndividual"))['perIndividual'];
$tax=($request->only("tax"))['tax'];
$name=($request->only("name"))['name'];
$email=($request->only("email"))['email'];
session(['email' =>($request->only("email"))['email']]);
$extra=json_decode(json_encode($request->only("extra")));
$startdate=(json_decode($extra->extra))->startdate;
$enddate=(json_decode($extra->extra))->enddate;
$course_name=(json_decode($extra->extra))->course_name;
$phone=$request->only("phone")['phone'];
$designation=$request->only("designation")['designation'];
$company=$request->only("company")['company'];
$country=$request->only("country")['country'];
$location=(json_decode($extra->extra))->location;
$data=Array("data"=>$dat,"total"=>$total,"perIndividual"=>$perIndividual,"tax"=>$tax,"name"=>$name,"email"=>$email,"startdate"=>$startdate,"enddate"=>$enddate,"designation"=>$designation,"company"=>$company,"course_name"=>$course_name,"phone"=>$phone,'country'=>$country, "location"=>$location);
          Mail::send(['html'=>'mail'], $data, function($message) {
         $message->to(session("email"), 'Successful Registration')->subject
            ('list of items');
         $message->from('ngugiantony1@gmail.com','Order Information ');
      });
       
        $application = $occurrence->applications()->create(
            $request->only(
                Schema::getColumnListing('classroom_training_applications')
            )
        );

        // Mail::to(config('mail.admin.address'))
        //     ->send(new ClassroomTrainingApplicationMail($application));

                  Mail::send(['html'=>'mailadmin'], $data, function($message) {
         $message->to("ngugiantony1@gmail.com", 'Successful Registration')->subject
            ('list of items');
         $message->from('ngugiantony1@gmail.com','Order Information ');
      });

        return redirect()->route('front.online_occurrence.feedback', $application);



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VirtualTrainingApplication $application
     * @return \Illuminate\Http\Response
     */
    public function feedback(VirtualTrainingApplication $application)
    {
        $application->load('occurrence.course');

        return view('front.course.virtual_schedule/feedback', compact('application'));
    }
}
