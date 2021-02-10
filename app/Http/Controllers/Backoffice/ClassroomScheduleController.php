<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Occurrence;

class ClassroomScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Occurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Occurrence $occurrence)
    {
    	$occurrence->load(['applications', 'course']);

        return view('backoffice.course.classroom_schedule.applications', compact('occurrence'));
    }
}
