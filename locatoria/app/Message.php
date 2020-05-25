<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $attributes = [
        'is_read' => 0,
    ];
}
