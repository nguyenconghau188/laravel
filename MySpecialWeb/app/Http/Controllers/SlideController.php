<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;


class SlideController extends Controller
{
    public function getDanhSach()
    {
    	$slide = Slide::all();

    	return view('admin/slide/danhsach', ['slide'=>$slide]);
    }

    public function getThem()
    {

    }

    public function postThem(Request $request)
    {
    	
    }

    public function getSua($id)
    {

    }

    public function postSua(Request $request, $id)
    {
    	
    }

    public function getXoa($id)
    {
    	
    }
}
