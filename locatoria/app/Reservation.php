<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'status' => '0'
    ];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function announceread(){

        $this->user_owner_read = 1 ;
        $this->save();
    }

    public function requestread(){

        $this->user_read = 1 ;
        $this->save();
    }

    public function announceviewed(){

        return $this->user_owner_read == 1 ? true : false;
    }

    public function requestviewed(){

        return $this->user_read == 1 ? true : false;
    }

}
