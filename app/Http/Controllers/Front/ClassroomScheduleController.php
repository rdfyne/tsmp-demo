<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 use App\Http\Requests\Front\Course\ClassroomTrainingApplicationRequest;
use App\Models\Course;
use App\Models\Occurrence;
use App\Models\ClassroomTrainingApplication;
use App\Mail\ClassroomTrainingApplicationMail;
use Mail;
use Schema;
use App\Models\inone;
use PDF;
use DB;

class ClassroomScheduleController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @param  \App\Models\Occurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function form(Course $course, Occurrence $occurrence,Request $request)
    {
        $startdate= $request->input("startdate");
        $enddate= $request->input("enddate");
        $location= $request->input("location");
        $course_name=$course->name;
        $extra=Array("startdate"=>$startdate,"enddate"=>$enddate,"course_name"=>$course_name,"location"=>$location);
        $extra=json_encode($extra);
        
        $array=Array("id"=>$occurrence->id);
     
        $costs=inone::getCost($array);

        $dayscholarKsh=$costs[0]->kes_cost_scholar;
        $fullborderKsh=$costs[0]->kes_cost;
        $dayscholartax =$costs[0]->tax;
        $day=$dayscholarKsh;

        $borders=$fullborderKsh;
        $tax=$dayscholartax;   
           
         return view('front.course.classroom_schedule/form', compact('occurrence', 'course','day','tax','borders','extra'));
    }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Front\Course\ClassroomTrainingApplicationRequest  $request
     * @param  \App\Models\OnlineOccurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function application(ClassroomTrainingApplicationRequest $request, Occurrence $occurrence)
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
        $location=(json_decode($extra->extra))->location;
        $phone=$request->only("phone")['phone'];
        $designation=$request->only("designation")['designation'];
        $company=$request->only("company")['company'];
        $country=$request->only("country")['country'];

        //generate random invoice number
        $id=DB::table("classroom_training_applications")->get();

        if(count($id)==0)
        {
         $id=1;
        }else
        {  
         $id=($id[count($id)-1]->id)+1;
        }
        $date = date('Y-m-d H:i:s');

        // download PDF file with download method
         $pdf = PDF::loadView('pdf_viewclassroom',compact('id','total','company','date','country','email'));
         $p= $pdf;
         $pdf->save(storage_path('invoice.pdf'));
         $file_path = storage_path('invoice.pdf');


        $data=Array("data"=>$dat,"total"=>$total,"perIndividual"=>$perIndividual,"tax"=>$tax,"name"=>$name,"email"=>$email,"startdate"=>$startdate,"enddate"=>$enddate,"designation"=>$designation,"company"=>$company,"course_name"=>$course_name,"phone"=>$phone,'country'=>$country,"location"=>$location);
          \Mail::send(['html'=>'mail'], $data, function($message) use($data, $p,$file_path){
         $message->to(session("email"), 'Successful Registration')->subject
            ('list of items');
         $message->from('ngugiantony1@gmail.com','Order Information ');
          $message->attach($file_path, [
        'as' => "invoice.pdf", 
          'mime' => 'application/pdf'   ]);
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

        return redirect()->route('front.occurrence.feedback', $application);



    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassroomTrainingApplication $application
     * @return \Illuminate\Http\Response
     */
    public function feedback(ClassroomTrainingApplication $application)
    {
        $application->load('occurrence.course');

        return view('front.course.classroom_schedule/feedback', compact('application'));
    }
}





