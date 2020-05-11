<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $guarded = [];

    protected $table = 'categories';


    public function items(){
        return $this->hasMany(Item::class);
    }

}
