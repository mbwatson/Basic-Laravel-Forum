<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class AdminController extends Controller
{
    /**
     * Show Administrative control panel for site.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function index() {
        return view('admin.index', [
            'channels' => Channel::all()
        ]);
    }

    /**
     * Show Channels control panel.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function channelsIndex() {
        return view('admin.channels.index', [
            'channels' => Channel::all()
        ]);
    }
}
