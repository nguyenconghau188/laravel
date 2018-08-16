<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;


class TinTucController extends Controller
{
    public function getDanhSach()
    {
    	$tintuc = TinTuc::orderBy('id', 'DESC')->get();
    	return view('admin.tintuc.danhsach', ['tintuc'=>$tintuc]);
    }
}
