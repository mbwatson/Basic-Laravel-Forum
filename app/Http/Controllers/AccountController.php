<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Edit the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit() {
        return view('auth.edit');
    }

    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request) {

        $this->validate($request, [
            'name' => 'required|min:4|max:20',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
        ]);
        
        Auth::user()->name =        $request->name;
        Auth::user()->first_name =  $request->first_name;
        Auth::user()->last_name =   $request->last_name;
        Auth::user()->location =    $request->location;
        Auth::user()->email =       $request->email;
        Auth::user()->save();
        
        session()->flash('flash_message', 'Profile successfully updated!');

        return view('auth.edit');
    }
}

