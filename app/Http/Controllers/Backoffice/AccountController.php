<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\Account\UpdateRequest;
use Auth;
use Schema;
use Hash;

class AccountController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('backoffice.account.edit', [
        	'user' => Auth::user()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Account\UpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        Auth::user()->update(array_replace(
        	$request->only(
	            Schema::getColumnListing('users')
	        ),
	        ['password' => $request->filled('password')
	    						? Hash::make($request->password)
	    						: Auth::user()->getAuthPassword()]
	    ));

        return back()->with('success', 'Account has been created');
    }
}
