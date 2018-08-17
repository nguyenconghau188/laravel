<?php

namespace App\Http\Controllers;

use DateTime;
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

    public function postThem(Request $request)
    {
        $this->validate($request, 
            [
                'TieuDe'=>'required|unique:TinTuc,TieuDe|min:1|max:190',
                'TomTat'=>'required',
                'NoiDung'=>'required',
                'HinhAnh'=>'required'
            ], 
            [
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'TieuDe.min'=>'Độ dài tiêu đề từ 1 đến 190 kí tự',
                'TieuDe.max'=>'Độ dài tiêu đề từ 1 đến 190 kí tự',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                'HinhAnh.required'=>'Bạn chưa chọn hình ảnh'
            ]);
        $tintuc = new TinTuc();
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->TomTat = $request->TomTat;
        $tintuc->NoiDung = $request->NoiDung;
        $tintuc->NoiBat = $request->NoiBat;
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->created_at = new DateTime();
        if ($request->hasFile('HinhAnh'))
        {
            $file = $request->HinhAnh;
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
            {
                return redirect('admin/tintuc/them')->with('loi', 'Chỉ chấp nhận file ảnh .jpg .jpeg .png!');
            }
            $filename = $file->getClientOriginalName();
            $HinhAnh = str_random(4)."_".$filename;
            while (file_exists("upload/tintuc/".$HinhAnh)) {
                $HinhAnh = str_random(4)."_".$filename;
            }
            $file->move('upload/tintuc', $HinhAnh);
            $tintuc->HinhAnh = $HinhAnh;
        }
        else {
            $tintuc->HinhAnh = "";
        }
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao', 'Thêm thành công');
    }
}
