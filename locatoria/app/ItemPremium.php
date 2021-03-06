<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPremium extends Model
{
    protected $guarded = [];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
