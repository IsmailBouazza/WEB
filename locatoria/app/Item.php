<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded = ['price'];
    // default values just to test change it when saving
    protected $attributes = [
        'user_id' => '1',
        'status' => '1'
    ];

    protected $table = 'items';


    public function category(){
        return $this->belongsTo(category::class);
    }

    public function favorites(){

        return $this->hasMany(User::class);

    }

    
}

