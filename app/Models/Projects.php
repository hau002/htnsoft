<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";

    protected $fillable = [
      
        'project_name',
        'description',
        'slug',
        'content',
        'images',
        'link_demo',
        'id_type',
        'id_user',
        'status',
    ];
}
