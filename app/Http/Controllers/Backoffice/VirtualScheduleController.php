<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OnlineOccurrence;

class VirtualScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\OnlineOccurrence  $occurrence
     * @return \Illuminate\Http\Response
     */
    public function __invoke(OnlineOccurrence $occurrence)
    {
    	$occurrence->load(['applications', 'course']);

        return view('backoffice.course.virtual_schedule.applications', compact('occurrence'));
    }
}
