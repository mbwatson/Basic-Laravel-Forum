<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Channel;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    	return view('posts.index', [
            'posts' => Post::latest()->paginate(config('global.perPage')),
            'channels' => Channel::orderBy('title')->get()
        ]);
    }

    /**
     * Show posts in a given channel.
     *
     * @param  App\Channel $channel
     * @return \Illuminate\Http\Response
     */
    public function showPostsInChannel(Channel $channel)
    {
        return view('posts.index', [
            'posts' => Post::latest('updated_at')->inChannel($channel)->paginate(config('global.perPage')),
            'channels' => Channel::orderBy('title')->get()
        ])->with('channel', $channel);
    }

   /**
     * Show posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
    	return view('posts.create', [
            'channels' => Channel::all()->pluck('title', 'id')
        ]);
    }

   /**
     * Store post to database.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request) {
        
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->channel_id = $request->channel_id;
        
        $request->user()->posts()->save($post);

        session()->flash('flash_message', 'Post Successful!');

        return redirect()->route('posts.index');
    }

   /**
     * Show single post.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post) {
    
        return view('posts.show', [
            'post' => $post,
            'comments' => $post->comments()->paginate(config('global.perPage'))
        ]);
    
    }

   /**
     * Show form to edit a post.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post) {
        return view('posts.edit', [
            'post' => $post,
            'channels' => Channel::all()->pluck('title', 'id')
        ]);
    }

   /**
     * Update post in database.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Post $post, CreatePostRequest $request) {

        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = null;
        $post->update();
        
        session()->flash('flash_message', 'Post successfully updated!');
        
        // See ya!
        return redirect()->route('posts.show', ['post' => $post]);
    }

    /**
     * (Soft)Delete a post from database.
     *
     * @param  App\Post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ( (Auth::user() != $post->user) ) {
            return redirect()->back();
        }
        $post->delete();
        
        session()->flash('flash_message', 'Post successfully deleted!');

        return redirect()->route('posts.index');
    }
}
