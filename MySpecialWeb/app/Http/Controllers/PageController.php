<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
use App\Slide;
use App\Comment;

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
        $tinnoibat = TinTuc::where('NoiBat', 1)->take(5)->get();
        $tinlienquan = TinTuc::where('idLoaiTin', $tintuc->idLoaiTin)->take(5)->get();
        return view('client.pages.tintuc', ['tintuc'=>$tintuc, 'tinnoibat'=>$tinnoibat, 'tinlienquan'=>$tinlienquan]);
    }
}
