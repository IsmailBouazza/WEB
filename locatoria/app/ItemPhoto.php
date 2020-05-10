<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
    //
    protected $table = 'itemphotos';

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
