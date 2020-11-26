<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = "settings";

    public $timestamps = false;

    protected $fillable = [
        'id',
        'facebook',
        'youtube',
        'twitter',
        'email',
        'phone',
        'map',
        'address',
        'instagram',
        
    ];
}


