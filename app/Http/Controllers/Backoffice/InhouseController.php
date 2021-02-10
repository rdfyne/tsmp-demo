<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Backoffice\User\StoreRequest;
use App\Http\Requests\Backoffice\User\UpdateRequest;
use Schema;
use Hash;
use App\Models\inone;

class InhouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
$res=inone::getdata();
        return view('backoffice.inhouse.index',["data"=>$res]);
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
