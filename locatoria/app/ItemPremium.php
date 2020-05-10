<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPremium extends Model
{
    //
    public function item(){
        return $this->belongsTo(Item::class);
    }
}
