<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
	protected $table = "news";
	protected $fillable = [

		'title', 
		'summary',
		'slug',
		'content', 
		'images', 
		'highlight', 
		'views', 
		'id_type',
		'id_user',
		'status',
	];

}
