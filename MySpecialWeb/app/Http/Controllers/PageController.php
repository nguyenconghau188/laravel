<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;

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
}
