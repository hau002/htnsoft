<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsComments extends Model
{
    protected $table = "news_comments";
	protected $fillable = [

		'id_news',
		'id_user',
		'content',
	];
}
