<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
   /**
     * Store comment to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCommentRequest $request) {
        
        $comment = new comment;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;

        $request->user()->comments()->save($comment);

        session()->flash('flash_message', 'Comment Posted Successfully!');

        return redirect()->route('posts.show', Post::find($request->post_id));
    }

    /**
     * Show a channel
     *
     * @param  App\Channel $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        $channel->load('posts');
        return view('channels.show', [ 'channel' => $channel ]);
    }
}
