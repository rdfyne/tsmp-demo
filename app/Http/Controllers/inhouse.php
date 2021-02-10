<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\inone;
use DB;
class inhouse extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$res=inone::getcourses();
   

        return view('front.inhouse.index',["courses"=>json_encode($res)]);
    }
    function adddata(Request $request){
$all=$request->except(['_token']);
$all1=$request->except(['_token']);
$array=Array("id"=>$request->input("course_id"));
$course=(DB::table("courses")->where($array)->get())[0]->name;
$all=json_decode(json_encode($all));
session(['email' =>($request->input("email"))]);
$all->course=$course;

$data=json_decode(json_encode($all),true);


          Mail::send(['html'=>'mailinhouseuser'], $data, function($message) {
         $message->to(session("email"), 'Successful Registration')->subject
            ('list of items');
         $message->from('ngugiantony1@gmail.com','Order Information ');
      });
             Mail::send(['html'=>'mailinhouseadmin'], $data, function($message) {
         $message->to('ngugiantony1@gmail.com', 'Successful Registration')->subject
            ('list of items');
         $message->from('ngugiantony1@gmail.com','Order Information ');
      });


$res=inone::register($all1);
if ($res) {
	return back()->with('success', 'Submitted successfully');
}
else{
	return "Failed";
}
    }
    function getdata(){
    	return inone::getdata();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('success', 'User has been deleted');
    }
}
