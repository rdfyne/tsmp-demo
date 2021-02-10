<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;

use DB;
class CourseController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Category $category, Course $course)
    {

        // $course->load([
        //  'occurrences' => function ($query) {
            
        //      $query->orderBy('occurrences.from');
        //  },
        //  'onlineOccurrences' => function ($query) {
            
        //      $query->orderBy('online_occurrences.from');
        //  },
        // ]);
        // return $course;
        $array=Array("course_id"=>$course->id);

$res= DB::table("online_occurrences")->where($array)->get();   
    $res1= DB::table("occurrences")->select('*')->selectRaw("(select name  from  venues where venues.id=occurrences.venue_id ) as venue")->where($array)->get();
$course->occurrences = $res1;
$course->online_occurrences = $res;


        return view('front.course/show', compact('category', 'course'));
    }
}
