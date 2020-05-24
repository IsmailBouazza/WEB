<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemReport extends Model
{
    protected $table = 'item_reporteds';
    protected $attributes = [
        'is_read' => 0
    ];
}
