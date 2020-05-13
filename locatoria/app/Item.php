<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'category_id','user_id', 'title', 'status','description', 'thumbnail_path', 
    ];

   

    protected $guarded = [];

   

    public function category(){
        return $this->belongsTo(Category::class);
    }
    // default values just to test change it when saving
    protected $attributes = [
        'user_id' => '1',
        'status' => '1'
    ];

  



    protected $table = 'items';


   
    public function favorites(){

        return $this->hasMany(User::class);

    }


    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
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