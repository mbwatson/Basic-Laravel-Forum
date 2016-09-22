<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;


class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'first_name', 'last_name', 'location', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
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
     * Get the posts that belong to the user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function posts()
    {
        return $this->hasMany('App\Post')->latest('created_at');
    }

   /**
     * Get the comments that belong to the user
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Build user's full name.
     *
     * @return String
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    /**
     * Retrieve user's favorite questions
     * 
     * @return 
     */
    public function favorites()
    {
        return $this->belongsToMany('App\Post', 'favorites')->withTimestamps();
    }

    /**
     * Retrieve user's activities
     * 
     * @return 
     */
    public function activities()
    {
        $posts = collect($this->posts);
        $comments = collect($this->comments);
        return $posts->merge($comments)->sortByDesc('created_at');
    }
}
