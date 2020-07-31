<?php

namespace App\Model\user;

use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    protected $fillable = [
        'userid', 'amount', 'status',
    ];
}
