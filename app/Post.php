<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Notifiable;
    use Sluggable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

   /**
     * Get the user that owns the post.
     *
     * @return App\User
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

   /**
     * Get the comments that belong to this post.
     *
     * @return App\Comments
     */
    public function comments()
    {
        return $this->hasMany('App\Comment')->oldest('created_at');
    }

   /**
     * Get the channel that owns this post.
     *
     * @return App\Channel
     */
    public function channel() {
        return $this->belongsTo('App\Channel');
    }

   /**
     * Scope a query to only include posts in a given channel.
     *
     * @param  query
     * @param  App\Channel
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInChannel($query, Channel $channel)
    {
        return Post::latest('created_at')->where('channel_id', $channel->id);
    }

    /**
     * Return users who have favorited this post.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function favorites()
    {
        return $this->belongsToMany('App\User', 'favorites')->withTimestamps();
    }
}
