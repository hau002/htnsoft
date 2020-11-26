<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class NewsTypes extends Model
{
	protected $table = "news_types";

	protected $fillable = [

		'name',
		'status',
		'slug',
		
	];

	static function getAllTypes(){

		$arr = [];

		$category = DB::table('news_types')->where('status',1)->get();
        
        foreach($category as $type){

        	$total = DB::table('news')->where([['id_type',$type->id],['status',1]])->get();

        	$item = ['id'=>$type->id,'name'=>$type->name,'slug'=>$type->slug,'total'=>count($total)];

        	$arr[] = $item;
        }

        return $arr;

	}
}
