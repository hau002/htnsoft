<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\News;
use App\Models\Feedback;
use App\Models\NewsTypes;
use App\Models\Settings;
use Hash;
use Session;
use Auth;
use DB;


class AdminController extends Controller
{

    public function Home(){

    	return view('admin.home.index');
    }


    public function ManageUsers(){

      $total = Users::count();
      $users = Users::paginate(10);

    	return view('admin.account.manage-users',compact('users','total'));
    }


    public function CreateUsers(){
    	
    	return view('admin.account.create');
    }

    // news category controller====================================

    public function AllNewsCate(){
        
        $total = NewsTypes::count();
        $news = NewsTypes::paginate(10);

        return view('admin.news-cate.all-news-cate',compact('news','total'));
    }

    public function NewsCate(){

        return view('admin.news-cate.create-news-cate');
    }

    public function SaveNewsCate(Request $req){

        $query = NewsTypes::create($req->all());

        return redirect()->back()->with('success','Thêm mới thành công');

    }


    public function editNewsCate($id){

     $newstype = NewsTypes::find($id);

     return view('admin.news-cate.edit-news-cate',['newstype'=>$newstype]);

    }



     public function updateNewsCate(Request $req){

       $newstype = NewsTypes::find($req->id)->update($req->all());

       return redirect()->route('admin.all-news-cate')->with('edit-success', 'Cập nhật thành công');

    }


    public function deleteNewsCate($id){

        NewsTypes::find($id)->delete();
        return redirect()->route('admin.all-news-cate')->with('success', 'Xóa thành công');
    }



    public function AllNews(){

        $total = News::count();
        $news = News::paginate(10);
        return view('admin.news.all-news',compact('news','total'));

     
    }

    public function to_slug($str){

      $str = trim(mb_strtolower($str));
      $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
      $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
      $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
      $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
      $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
      $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
      $str = preg_replace('/(đ)/', 'd', $str);
      $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
      $str = preg_replace('/([\s]+)/', '-', $str);
      return $str;

    }

    public function detailNews($slug){

        $new = News::where('slug',$slug)->first();

        if($new){

            $data = News::join('news_types', 'news_types.id', '=', 'news.id_type')
                         ->join('users', 'users.id', '=', 'news.id_user')
                         ->where('news.slug',$slug)
                         ->select('news.id','news.title','news.summary','news.images','news.content','news.created_at','news.views','users.name as author','news_types.name as category')
                         ->first();

           return view('admin.news.detail-news',compact('data'));

        }else{
            return redirect()->back();
        }
       
    }

     public function News(){
      
        $danhmuc = NewsTypes::all();
        return view('admin.news.create-news',compact('danhmuc'));
    }

    public function SaveNews(Request $req){

        $this->validate($req,
            [
                'title' => 'required',
                'summary' => 'required',
                'content' => 'required',
                'status' => 'required',
            ]
        );

        if($req->hasFile('images')){
            $file = $req->file('images')->getClientOriginalName();

            $hinh =  str_random(4)."_". $file;

            $path = public_path('img'); 

            $req->file('images')->move($path,$hinh);

        }else{

            $hinh = '';
        }

        if($req->highlight != ''){

            $highlight = $req->highlight;
        }else{

           $highlight = 0;
        }

        //#Tạo url slug bài viết
        $slug = $this->to_slug($req->title).'-'.rand(1000,1000000);

       $data = new News();
       $data->title = $req->title;
       $data->slug = $slug;
       $data->summary = $req->summary;
       $data->content = $req->content;
       $data->status = $req->status;
       $data->images= $hinh;
       $data->id_user= Auth::user()->id;
       $data->id_type= $req->id_type;
       $data->highlight = $highlight;
       $data->views= 0;
       $data->save();


       return redirect()->back()->with('success','Thêm mới thành công');
    }


    public function editNews($id){

        $danhmuc = NewsTypes::all();

        $news = News::find($id);

        return view('admin.news.edit-news',compact('danhmuc','news'));


    }


    public function updateNews(Request $req){


        $news = News::find($req->id)->update($req->all());

        return redirect()->route('admin.all-news')->with('edit-success', 'Sửa thành công');
    }


    public function deleteNews($id){

        News::where('id', $id)->delete();

        return redirect()->back()->with('edit-success', 'Xóa thành công');
        
    }

    public function AllContact(){

        $contact1 = Feedback::paginate(5);

        return view('admin.contact.all-contact',compact('contact1'));
    }


    public function SaveContact(Request $req){

        $query = Feedback::create($req->all());

        return redirect()->back()->with('success','Gửi thành công');

    }

    public function SettingWebsite(){
        
        $data = Settings::first();

        return view('admin.settings.index',compact('data'));  
    }


    public function SaveSettingWebsite(Request $req){
        
        $query = Settings::where('id',1)->update($req->except(['_method','_token']));

        return redirect()->back();
    }

}
