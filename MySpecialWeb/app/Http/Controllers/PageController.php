<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\Comment;
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
}
