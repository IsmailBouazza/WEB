<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone', 'adresse', 'city', 'zip_code','picture','bio',
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [];

    public function items(){
        return $this->hasMany(Item::class)->orderBy('created_at', 'DESC');
    }

    // response that i receive from other landlords
    public function reservations(){
        return $this->hasMany(Reservation::class)->orderBy('created_at', 'DESC');
    }

    // requests that i receive from other clients
    public function reservationsrequest(){
        return $this->hasMany(Reservation::class,'user_owner_id')->orderBy('created_at', 'DESC');
    }

    // $col is the reservation id an attribute of data(json) in the notification table
    public function notifications_data($col)
    {
        $notifications = $this->notifications()
            ->where('data','LIKE','{"reservation_id":1}')
            ->get();

        return ($notifications);
    }

    // $user->comments will return comments on this user
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function myitemscomments(){
        return $this->hasMany(Comment::class , "user_id")->where('commentable_type', Item::class);
    }

    public function myuserscomments(){
        return $this->hasMany(Comment::class , "user_id")->where('commentable_type', self::class );
    }

    public function favorites(){
        return $this->belongsToMany(Item::class ,'Favorites' ,'user_id','item_id')->withPivot('created_at','id','updated_at');
    }

}
