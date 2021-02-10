<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Schema;
use Storage;
use Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::has('category')->with('category')->latest()->get();

        return view('backoffice.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = $request->hasFile('cover') ? $request->file('cover')->store('courses') : '';

        $course = Course::create( array_replace(
            $request->only(Schema::getColumnListing('courses')), [
                'cover' => $cover,
                'slug' => Str::slug($request->name, '-'),
                'featured' => $request->featured ?? 0
            ]
        ));

        $course->otherCategories()->attach($request->otherCategories);

        if (! empty($request->occurrences))
        {
            $course->occurrences()->createMany(array_map(function ($occurrence) use ($course) {
                $newOccurrence = [];
    
                foreach (explode(',', $occurrence) as $value)
                {
                    $value = explode(':', $value);
                    $newOccurrence += [$value[0] => $value[1]];
                }
                return $newOccurrence;
    
            }, explode('|', $request->occurrences)));
        }

        if ( $request->has('enable_online_booking') and $request->filled('online_occurrences') ) {

            # save online occurrences

            $course->onlineOccurrences()->createMany( array_map(function ($occurrence) use ($course) {

                $newOccurrence = [];
    
                foreach (explode(',', $occurrence) as $value)
                {
                    $value = explode(':', $value);
                    $newOccurrence += [$value[0] => $value[1]];
                }
                return $newOccurrence;
    
            }, explode('|', $request->online_occurrences)) );
        }

        session()->flash('success', 'Course has been saved');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        $course->load(['occurrences', 'onlineOccurrences']);

        return view('backoffice.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course->load(['category', 'otherCategories', 'occurrences', 'occurrences.venue', 'onlineOccurrences']);

        return view('backoffice.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('courses');
            Storage::delete($course->cover);
        }
        else $cover = $course->cover;

        $course->update( array_replace(
            $request->only(Schema::getColumnListing('courses')), [
                'cover' => $cover,
                'slug' => Str::slug($request->name, '-'),
                'featured' => $request->featured ?? 0
            ]
        ));

        $course->otherCategories()->sync($request->otherCategories);

        if (! empty($request->occurrences))
        {
            $course->occurrences()->createMany(array_map(function ($occurrence) use ($course) {
                $newOccurrence = [];
    
                foreach (explode(',', $occurrence) as $value)
                {
                    $value = explode(':', $value);
                    $newOccurrence += [$value[0] => $value[1]];
                }
                
                return $newOccurrence;
    
            }, explode('|', $request->occurrences)));
        }

        if ( $request->has('enable_online_booking') and $request->filled('online_occurrences') ) {

            # save online occurrences

            $course->onlineOccurrences()->createMany( array_map(function ($occurrence) use ($course) {

                $newOccurrence = [];
    
                foreach (explode(',', $occurrence) as $value)
                {
                    $value = explode(':', $value);
                    $newOccurrence += [$value[0] => $value[1]];
                }
                return $newOccurrence;
    
            }, explode('|', $request->online_occurrences)) );
        }

        session()->flash('success', 'Course has been updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Course has been deleted');
    }
}
