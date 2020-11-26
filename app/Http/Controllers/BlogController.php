<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\News;
use App\Models\Feedback;
use App\Models\NewsComments;
use App\Models\NewsTypes;
use Hash;
use Session;
use Auth;
use DB;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
      
        $data = News::join('news_types', 'news_types.id', '=', 'news.id_type')->select('news.id','news.slug','news.title','news.summary','news.images','news.created_at','news.views','news_types.name')->paginate(2);

        $listcate = NewsTypes::getAllTypes();    
        
        $recentpost = News::orderBy('created_at','DESC')->limit(4)->get();
        
        return view('client.news.index',compact('data','listcate','recentpost'));

    }

    
    public function CmtBlog(Request $req){

        $cmt = new NewsComments;
        $cmt->id_news = $req->id_news;
        $cmt->content = $req->content;
        $cmt->name = $req->name;
        $cmt->email = $req->email;
        $cmt->save();
        return redirect()->back();
    }


    public function Category($slug){

        $category = NewsTypes::where('slug',$slug)->first();

        if($category){

            $news = News::join('news_types', 'news_types.id', '=', 'news.id_type')->select('news.id','news.slug','news.title','news.summary','news.images','news.created_at','news.views','news_types.name')->where([['news.id_type',$category->id],['news.status',1]])->paginate(10);

            $listcate = NewsTypes::getAllTypes();    
        
            $recentpost = News::orderBy('created_at','DESC')->limit(4)->get();  

            return view('client.news.category',compact('news','listcate','recentpost','category'));

        }else{

           return redirect()->back();

        }
    }



    public function Search(Request $req){

        if($req->keyword != ''){

            $keyword = $req->keyword;

            $total= News::where('title','LIKE','%'.$keyword.'%')
                           ->orWhere('summary','like',$keyword)
                           ->where('status',1)
                           ->count();

            $news = News::join('news_types', 'news_types.id', '=', 'news.id_type')->select('news.id','news.slug','news.title','news.summary','news.images','news.created_at','news.views','news_types.name')->where('news.title','LIKE','%'.$keyword.'%')
                           ->orWhere('news.summary','LIKE',$keyword)
                           ->where('news.status',1)
                           ->paginate(10);

            $listcate = NewsTypes::getAllTypes();    
        
            $recentpost = News::orderBy('created_at','DESC')->limit(4)->get();  

            return view('client.news.search',compact('news','listcate','recentpost','total','keyword'));


        }else{

           return redirect()->back();

        }

          
    }



    public function detail($slug)
    {
        $news = DB::table('news')->where('slug',$slug)->first();

        $viewcount = $news->views + 1;

        $query = DB::table('news')->where('slug',$slug)->Update(['views'=>$viewcount]);

        $datasingle = News::join('news_types', 'news_types.id', '=', 'news.id_type')
                            ->select('news.id','news.slug','news.title','news.summary','news.images','news.created_at','news.content','news.views','news_types.name')
                            ->where('news.slug',$slug)
                            ->first();

        $listcate = NewsTypes::getAllTypes();

        $recentpost = News::orderBy('created_at','DESC')->limit(4)->get();

        $relatedpost = News::where([['id_type',$news->id_type],['id','<>',$news->id]])->get();

        $comment =  NewsComments::where('id_news',$news->id)->get();
        
        return view('client.news.detail',compact('datasingle','listcate','recentpost','comment','relatedpost'));
    }

 
}







