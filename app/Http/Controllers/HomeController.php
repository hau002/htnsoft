<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\Room;
use App\Models\Position;
use App\Models\Projects;
use Hash;
use Session;
use Auth;


class HomeController extends Controller
{

    
    public function Home(){
    	$new_product = Projects::join('project_types','projects.id_type','=','project_types.id')->where([['projects.status',1],['project_types.status',1]])->select('project_types.name','projects.id','projects.project_name','projects.slug','projects.description','projects.images')->orderBy('projects.created_at','desc')->paginate(6);
    	$total = Projects::count();
    	return view('client.home.index',compact('new_product','total'));
    
    }

    





}
