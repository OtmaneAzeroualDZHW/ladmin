<?php

namespace Hexters\Ladmin\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    
    protected $fillable = [
        'user_id',
        'gates'
    ];

    protected $casts = [
        'gates' => 'array'
    ];
}