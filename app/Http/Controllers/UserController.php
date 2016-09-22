<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    	return view('users.index', [
            'users' => User::orderBy('name')->get()
        ]);
    }

   /**
     * Show single user.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {
    
        return view('users.show', [
            'user' => $user
        ]);
    }

}