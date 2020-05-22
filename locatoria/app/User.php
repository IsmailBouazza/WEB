<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;
use App\Mail\ NewUserWelcomeMail;

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

    protected static function boot(){
        
        parent::boot();

        static::created(function ($user){

            Mail::to($user->email)->send(new NewUserWelcomeMail($user));
        
        });

    }

    public function items(){
        return $this->hasMany(Item::class)->orderBy('created_at', 'DESC');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class)->orderBy('created_at', 'DESC');
    }

    public function announces(){
        return $this->hasMany(Reservation::class,'user_owner_id')->orderBy('created_at', 'DESC');
    }

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
