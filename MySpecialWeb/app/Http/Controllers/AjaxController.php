<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\LoaiTin;
use App\TheLoai;


class AjaxController extends Controller
{
    public function getLoaiTin($id)
    {
    	$loaitin = LoaiTin::where('idTheLoai', $id)->get();
    	foreach($loaitin as $lt)
    	{
            echo "<option value='".$lt->id."'>".$lt->Ten."</option>";
    	}
    }
    public function getTheLoai($idLoaiTin)
    {
    	$loaitin = LoaiTin::find($idLoaiTin);
    	$theloai = $loaitin->theloai;
    	echo "<option value='".$theloai->id."'>".$theloai->Ten."</option>";
    }

}
