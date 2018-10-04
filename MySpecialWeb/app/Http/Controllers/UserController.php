<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DateTime;


class UserController extends Controller
{
    //
    public function getDanhSach()
    {
    	$users = User::all();
    	return view('admin.user.danhsach', ['users'=>$users]); 
    }

    public function getThem()
    {
    	return view('admin.user.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request, 
    		[
    			'Username'=>'required|unique:Users,name|min:6|max:32',
    			'Password'=>'required|min:6|max:32',
    			'password_confirm'=>'required|min:6|max:32',
    			'email'=>'required|unique:Users,email|email',
    			'level'=>'required'
    		], 
    		[
    			'Username.required'=>'Bạn chưa nhập tên tài khoản',
    			'Username.unique'=>'Tên tài khoản đã tồn tại',
    			'Username.min'=>'Tên tài khoản phải có ít nhất 6 kí tự',
    			'Username.max'=>'Tên tài khoản có nhiều nhất 32 kí tự',
    			'Password.required'=>'Bạn chưa nhập mật khẩu',
    			'Password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
    			'Password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
    			'password_confirm.required'=>'Bạn chưa nhập mật khẩu xác nhận',
    			'password_confirm.min'=>'Mật khẩu xác nhận phải có ít nhất 6 kí tự',
    			'password_confirm.max'=>'Mật khẩu xác nhận có nhiều nhất 32 kí tự',
    			'email.required'=>'Bạn chưa nhập địa chỉ email',
    			'email.unique'=>'Địa chỉ email đã tồn tại',
    			'email.email'=>'Địa chỉ email không hợp lệ',
    			'level.required'=>'Bạn chưa nhập quyền'
    		]);
    	if ($request->Password != $request->password_confirm) {
    		return redirect('admin/user/them')->with('loi','Mật khẩu không trùng nhau!');
    	}
    	$user = new User();
    	$user->name = $request->Username;
    	$user->password = bcrypt($request->Password);
    	$user->email = $request->email;
    	$user->level = $request->level;
    	$user->created_at = new DateTime();
    	$user->save();

    	return redirect('admin/user/them')->with('thongbao', 'Thêm thành công!');
    }

    public function getSua($id)
    {
    	$user = User::find($id);
    	return view('admin.user.sua', ['user'=>$user]);
    }

    public function postSua(Request $request, $id)
    {
    	$user = User::find($id);
    	$this->validate($request, 
    		[
    			'Username'=>'required|min:6|max:32|unique:Users,name,'.$user->id,
    			'email'=>'required|email|unique:Users,email,'.$user->id,
    			'level'=>'required'
    		], 
    		[
    			'Username.required'=>'Bạn chưa nhập tên tài khoản',
    			'Username.unique'=>'Tên tài khoản đã tồn tại',
    			'Username.min'=>'Tên tài khoản phải có ít nhất 6 kí tự',
    			'Username.max'=>'Tên tài khoản có nhiều nhất 32 kí tự',
    			'email.required'=>'Bạn chưa nhập địa chỉ email',
    			'email.unique'=>'Địa chỉ email đã tồn tại',
    			'email.email'=>'Địa chỉ email không hợp lệ',
    			'level.required'=>'Bạn chưa nhập quyền'
    		]);
    	if ($request->Password != $request->password_confirm) {
    		return redirect('admin/user/sua/'.$user->id)->with('loi','Mật khẩu không trùng nhau!');
    	}
    	$user->name = $request->Username;
    	if($request->Password != ''){
    		$user->password = bcrypt($request->Password);
    	}
    	$user->email = $request->email;
    	$user->level = $request->level;
    	$user->updated_at = new DateTime();
    	$user->save();

    	return redirect('admin/user/sua/'.$user->id)->with('thongbao', 'Sửa thành công!');
    }

    public function getXoa($id)
    {
    	$user = User::find($id);
    	$name = $user->name;
    	$user->delete();

    	return redirect('admin/user/danhsach')->with('thongbao', 'Xóa thành công tài khoản: '.$name);
    }

//login
    public function getLoginAdmin()
    {
    	if (Auth::check()) {
    		return redirect('admin/user/danhsach');
    	}
    	return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
    	$this->validate($request, 
    		[
    			'username'=>'required',
    			'password'=>'required'
    		], 
    		[
    			'username.required'=>'Bạn chưa nhập username',
    			'password.required'=>'Bạn chưa nhập password'
    		]);
    	//echo 'username= '.$request->username.' || password= '.$request->password;
    	$dataAttemp = array(
    			'name'=>$request->username,
    			'password'=>$request->password
    		);
 //   	var_dump($dataAttemp);
    	if (Auth::attempt($dataAttemp)) {
    		return redirect('admin/user/danhsach')->with('', '');
    	}
    	else {
    		return redirect('admin/login')->with('loi','Đăng nhập không thành công');
    	}
    	
    }
    public function getLogoutAdmin()
    {
    	Auth::logout();
    	return redirect('admin/login');
    }
}
