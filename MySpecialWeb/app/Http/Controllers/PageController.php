<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\Comment;
use App\User;
use Auth;
use DateTime;


class PageController extends Controller
{
	public function __construct()
	{
		$theloai = TheLoai::all();
        $slide = Slide::all();
		view()->share('theloai', $theloai);
        view()->share('slide', $slide);
	}

    public function trangchu()
    {
    	return view('client.pages.trangchu');
    }

    public function lienhe()
    {
    	return view('client.pages.lienhe');
    }

    public function loaitin($id)
    {
        $loaitin = LoaiTin::find($id);
        $tintuc = TinTuc::where('idLoaiTin', $id)->paginate(8);
    	return view('client.pages.loaitin', ['loaitin'=>$loaitin, 'tintuc'=>$tintuc]);
    }

    public function tintuc($id)
    {
        $tintuc = TinTuc::find($id);
        $tintuc->SoLuotXem +=1;
        $tintuc->save();
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(5)->get();
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(5)->get();
        return view('client.pages.tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }

    public function getUserLogin()
    {
        return view('client.login');
    }

    public function postUserLogin(Request $request)
    {
        $this->validate($request, 
            [
                'username'=>'required',
                'password'=>'required'
            ], 
            [
                'username.required'=>'Bạn chưa nhập tên tài khoản',
                'password.required'=>'Bạn chưa nhập mật khẩu'
            ]);

        $data = [
            'name'=>$request->username,
            'password'=>$request->password
            ];
        if (Auth::check()) {
            Auth::logout();
        }
        if (Auth::attempt($data)) {
            $user = Auth::user();
            if ($user->status == 1) {
                return redirect('trangchu');  
            }
            else {
                Auth::logout();
                return redirect('dangnhap')->with('loi','Tài khoản chưa được kích hoạt');
            }            
        }
        return redirect('dangnhap')->with('loi','Đăng nhập không thành công');
    }

    public function getUserLogout()
    {
        Auth::logout();
        return redirect('dangnhap');
    }

    public function postComment(Request $request, $idUser, $idTintuc)
    {
        $comment = new Comment();
        $comment->idUser = $idUser;
        $comment->idTinTuc = $idTintuc;
        $comment->NoiDung = $request->comment;
        $comment->created_at = new DateTime();
        $comment->save();

        return redirect()->back();
    }

    public function getUserProfile()
    {
        return view('client.pages.nguoidung');
    }

    public function postUserProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $this->validate($request, 
            [
                'name'=>'required|min:6|max:32|unique:Users,name,'.$user->id,
            ], 
            [
                'name.required'=>'Bạn chưa nhập tên tài khoản',
                'name.unique'=>'Tên tài khoản đã tồn tại',
                'name.min'=>'Tên tài khoản phải có ít nhất 6 kí tự',
                'name.max'=>'Tên tài khoản có nhiều nhất 32 kí tự'
            ]);

        if ($request->checkpassword == 1) {
            $this->validate($request, 
            [
                'password'=>'required|min:6|max:32',
                'passwordAgain'=>'required|min:6|max:32'
            ], 
            [
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu khoản có nhiều nhất 32 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập mật khẩu xác nhận',
                'passwordAgain.min'=>'Mật khẩu xác nhận phải có ít nhất 6 kí tự',
                'passwordAgain.max'=>'Mật khẩu xác nhận có nhiều nhất 32 kí tự'
            ]);

            if ($request->password != $request->passwordAgain) {
                return redirect('nguoidung')->with('loi', 'Mật khẩu và mật khẩu xác nhận không giống nhau');
            }

            if ($request->password != $user->password) {
                $user->password = bcrypt($request->password);
            }

            $this->reLogin($request->name, $request->password);
        }

        $user->name = $request->name;
        $user->save();
        return redirect('nguoidung')->with('thongbao', 'Sửa thông tin người dùng thành công!');
    }

    public function reLogin($name, $password)
    {
        if (Auth::check()) {
            Auth::logout();
        }
        $data = [
            'name'=>$name,
            'password'=>$password
        ];
        Auth::attempt($data);
    }
}
