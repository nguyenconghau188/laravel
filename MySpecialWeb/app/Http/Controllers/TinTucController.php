<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;




class TinTucController extends Controller
{
    public function getDanhSach()
    {
    	$tintuc = TinTuc::orderBy('id', 'DESC')->get();
    	return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }

    public function getThem()
    {
    	$theloai = TheLoai::all();
    	$loaitin = LoaiTin::all();
    	return view('admin.tintuc.them', ['theloai'=>$theloai, 'loaitin'=>$loaitin]);
    }
}
