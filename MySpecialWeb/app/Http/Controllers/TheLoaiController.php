<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
    	return view('admin.theloai.danhsach');
    }

    public function getSua()
    {
    	
    }
}
