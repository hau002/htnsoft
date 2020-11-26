<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Hash;
use Session;
use Auth;


class UserController extends Controller
{  

    public function changeLanguage($language){

      Session::put('language', $language);

      return redirect()->back();
      
    }

    public function Login(){

       return view('admin.authentication.login');

    }

    public function getLogin(Request $request){
         $this->validate($request,[
          'username'=>'required',
          'password'=>'required|min:5|max:20'
        ],
        [
          'username'=>'Hãy nhập email',
          'password.min'=>'Mật khẩu tối đa 5 ký tự',
          'password.max'=>'Mật khẩu không quá 20 ký tự'
        ]);

         $check = array('email'=>$request->username,'password'=>$request->password);

         if(Auth::attempt($check)){
          Session::put('userid',Auth::user()->id);
          Session::put('username',Auth::user()->name);
          Session::put('userrole',Auth::user()->role);
          return redirect()->route('admin.home');

        }else{

         return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập thất bại. Sai tài khoản hoặc mật khẩu']);

       }   
    }

    public function SaveUsers(Request $req){

      $this->validate($req,[
            'email'=>'required|unique:users,email',
            'password'=>'required|min:6|max:20',
            'name'=>'required',
            'role'=>'required'
        ],
        [
           
            'email.required'=>'Hãy nhập địa chỉ email',
            'email.unique'=>'Email đã thuộc về 1 tài khoản',
            'name.required'=>'Hãy nhập tên cán bộ',
            'password.min'=>'Mật khẩu tối đa 6 ký tự',
            'password.max'=>'Mật khẩu không quá 20 ký tự',
            'password.required'=>'Mật khẩu không không được để trống',
            'role.required'=>'Hãy chọn quyền'
        ]);

        $birth = ($req->date != null) ? date("d/m/Y", strtotime($req->date)) : '';

        $user = new Users();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->birth = $birth;
        $user->phone = $req->phone;
        $user->role = $req->role;
        $user->stt = 1;
        $user->password = bcrypt($req->password);
        $user->save();

        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }

    public function DeleteUsers($id){

        $data = Users::find($id)->delete();
        return redirect()->back();
    }

    public function Logout(){
       Auth::logout();
       Session::forget('userid');
       Session::forget('username');
       return redirect()->route('login');
    }
}
