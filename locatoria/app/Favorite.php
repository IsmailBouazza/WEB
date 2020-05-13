<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Favorite extends Model
{

    protected $fillable = ['user_id','item_id'];

    public function item(){

        return $this->hasMany(Item::class);
        
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

 
}
