<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = [
        'category_id','user_id', 'title', 'status','description', 'thumbnail_path', 
    ];

   

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    // default values just to test change it when saving
    protected $attributes = [
        'user_id' => '1',
        'status' => '1'
    ];

    public function photos(){
        return $this->hasMany(ItemPhoto::class);
    }

}

