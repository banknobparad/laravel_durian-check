<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkdata extends Model
{
    protected $guarded = [];

    use HasFactory;

    function user()
    {
        return $this->hasMany('App\Models\user', 'id', 'user_id');
    }
}
