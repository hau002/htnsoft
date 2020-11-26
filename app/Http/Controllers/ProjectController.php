<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Projects;
use App\Models\ProjectTypes;
use Hash;
use Session;
use Auth;


class ProjectController extends Controller
{


    public function ProjectDetail($slug){

        $projects = Projects::where([['slug',$slug],['status',1]])->first();

        if($projects){

           $data = Projects::join('project_types', 'project_types.id', '=', 'projects.id_type')
                   ->where([['projects.slug',$slug],['projects.status',1]])
                   ->select('projects.id','projects.slug','projects.project_name','projects.description','projects.content','projects.images','projects.img_detail','projects.link_demo','projects.created_at','project_types.name')->first();  

           return view('client.projects.detail',compact('data'));

        }else{

           return redirect()->back();

        }

        
    }


    public function AllProjectCate(){

        $total = ProjectTypes::count();
        $project_cate = ProjectTypes::paginate(5);

        return view('admin.project-cate.all-project-cate',compact('project_cate','total'));
    }

    public function ProjectCate(){

        return view('admin.project-cate.create-project-cate');
    }

    public function SaveProjectCate(Request $req){

        $query = ProjectTypes::create($req->all());

        return redirect()->back()->with('success','Thêm mới thành công');

    }


    public function editProjectCate($id){
       $projecttype = ProjectTypes::find($id);
       return view('admin.project-cate.edit-project-cate',['projecttype'=>$projecttype]);
    }


    public function updateProjectCate(Request $req){

       $projecttype = ProjectTypes::find($req->id)->update($req->all());

       return redirect()->route('admin.all-project-cate')->with('edit-success', 'Sửa thành công');

    }


    public function deleteProjectCate($id){

        projectTypes::find($id)->delete();
        return redirect()->route('admin.all-project-cate');
    }


    public function AllProject(){

        $total= Projects::count();
        $projects = Projects::paginate(10);
        return view('admin.project.all-project',compact('projects','total'));
    }

    public function project(){
      
        $pro_type = ProjectTypes::all();
        return view('admin.project.create-project',compact('pro_type'));
    }

    public function SaveProject(Request $req){

          $this->validate($req,
              [
                  'project_name' => 'required',
                  'description' => 'required',
                  'content' => 'required', 
                  'link_demo' => 'required',
                  'status' => 'required',
              ]
          );
          
          //#Xử lý ảnh đại diện
          if($req->hasFile('images')){
              $file = $req->file('images')->getClientOriginalName();

              $hinh =  str_random(4)."_". $file;

              $path = public_path('img'); 

              $req->file('images')->move($path,$hinh);


          }else{

              $hinh = '';
          }
          
         
         //#Xử lý ảnh chi tiết sản phẩm

        if($req->hasFile('img_detail')){

            $arr = [];
            foreach ($req->img_detail as  $value) {
                $file = $value->getClientOriginalName();

                $img =  str_random(4)."_". $file;

                $path = public_path('img'); 

                $value->move($path,$img);

                $arr[] = $img;

            }

            $tenanh = implode(",", $arr);

        }else {

            $tenanh = '';
        }

        //# Lưu sản phẩm
       $data = new Projects();
       $data->project_name = $req->project_name;
       $data->description = $req->description;
       $data->slug = $this->to_slug($req->project_name).'-'.rand(1000,1000000);
       $data->content = $req->content;
       $data->status = $req->status;
       $data->images= $hinh;
       $data->img_detail= $tenanh;
       $data->link_demo= $req->link_demo;
       $data->id_user= Auth::user()->id;
       $data->id_type= $req->id_type;
       $data->save();

       return redirect()->back()->with('success','Thêm mới thành công');
    }


    public function editProject($id){

        $pro_type = ProjectTypes::all();
        $project = Projects::find($id);
        return view('admin.project.edit-project',compact('pro_type','project'));


    }


    public function updateProject(Request $req){

        $project = Projects::find($req->id)->update($req->all());

        return redirect()->route('admin.all-project')->with('edit-success', 'Sửa thành công');
    }


    public function deleteProject($id){

        Projects::find($id)->delete();
        return redirect()->route('admin.all-project')->with('success', 'Xóa thành công');

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




}
