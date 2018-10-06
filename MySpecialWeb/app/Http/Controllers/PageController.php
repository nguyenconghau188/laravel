<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;

class PageController extends Controller
{
    public function trangchu()
    {
    	$theloai = TheLoai::all();
    	return view('client.pages.trangchu', ['theloai'=>$theloai]);
    }
}
