<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = [];
    // default values just to test change it when saving
    protected $attributes = [
        'user_id' => '1',
        'status' => '1'
    ];

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function photos(){
        return $this->hasMany(ItemPhoto::class);
    }

    public function premium(){
        return $this->hasOne(ItemPremium::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function fans(){
        return $this->belongsToMany(User::class , 'Favorites' , 'item_id', 'user_id')->withPivot('created_at','id','updated_at');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}

