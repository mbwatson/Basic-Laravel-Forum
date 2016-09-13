<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   /**
     * Get the user that owns the comment.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

   /**
     * Get the post that owns the comment.
     *
     * @return App\User
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
