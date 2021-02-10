<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Venue\StoreRequest;
use App\Http\Requests\Backoffice\Venue\UpdateRequest;
use Schema;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::latest()->get();

        return view('backoffice.venue.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backoffice.venue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        Venue::create($request->only(
            Schema::getColumnListing('venues')
        ));

        return back()->with('success', 'Venue has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        return view('backoffice.venue.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Venue\UpdateRequest  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Venue $venue)
    {
        $venue->update($request->only(
            Schema::getColumnListing('venues')
        ));

        return back()->with('success', 'Venue has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return back()->with('success', 'Venue has been deleted');
    }
}
