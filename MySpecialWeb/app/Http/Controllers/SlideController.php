<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use DateTime;


class SlideController extends Controller
{
    public function getDanhSach()
    {
    	$slide = Slide::all();

    	return view('admin/slide/danhsach', ['slide'=>$slide]);
    }

    public function getThem()
    {
    	return view('admin.slide.them');
    }

    public function postThem(Request $request)
    {
    	$this->validate($request,
    		[
    			'Ten'=>'required|unique:Slide,Ten|min:1|max:190',
    			'Hinh'=>'required',
    			'NoiDung'=>'required',
    			'Link'=>'required'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên slide',
    			'Ten.min'=>'Độ dài tên slide từ 1 đến 190 kí tự',
                'Ten.max'=>'Độ dài tên slide từ 1 đến 190 kí tự',
                'Ten.unique'=>'Tên slide đã tồn tại',
                'Hinh.required'=>'Bạn chưa chọn hình ảnh',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                'Link.required'=>'Bạn chưa nhập đường dẫn slide'
    		]);

    	$slide = new Slide();
    	$slide->Ten = $request->Ten;
    	$slide->NoiDung = $request->NoiDung;
    	$slide->Link = $request->Link;
    	$slide->created_at = new DateTime();
    	if ($request->hasFile('Hinh')) {
    		$file = $request->Hinh;
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/slide/them')->with('loi', 'Chỉ chấp nhận file ảnh .jpg, .jpeg .png!');
    		}
    		$filename = $file->getClientOriginalName();
    		$Hinh = str_random(4)."_".$filename;
    		while (file_exists("upload/slide/".$Hinh)) {
    		    $Hinh = str_random(4)."_".$filename;
    		}
    		$file->move('upload/slide', $Hinh);
    		$slide->Hinh = $Hinh;
    	}
    	else {
    		$slide->Hinh = '';
    	}
    	$slide->save();
    	return redirect('admin/slide/them')->with('thongbao', "Thêm thành công!");
    }

    public function getSua($id)
    {
    	$slide = Slide::find($id);
    	return view('admin.slide.sua', ['slide'=>$slide]);
    }

    public function postSua(Request $request, $id)
    {
    	$slide = Slide::find($id);
    	$this->validate($request,
    		[
    			'Ten'=>'required|min:1|max:190|unique:Slide,Ten,'.$slide->id,
    			'Hinh'=>'required',
    			'NoiDung'=>'required',
    			'Link'=>'required'
    		],
    		[
    			'Ten.required'=>'Bạn chưa nhập tên slide',
    			'Ten.min'=>'Độ dài tên slide từ 1 đến 190 kí tự',
                'Ten.max'=>'Độ dài tên slide từ 1 đến 190 kí tự',
                'Ten.unique'=>'Tên slide đã tồn tại',
                'Hinh.required'=>'Bạn chưa chọn hình ảnh',
                'NoiDung.required'=>'Bạn chưa nhập nội dung',
                'Link.required'=>'Bạn chưa nhập đường dẫn slide'
    		]);

    	$slide->Ten = $request->Ten;
    	$slide->NoiDung = $request->NoiDung;
    	$slide->Link = $request->Link;
    	$slide->updated_at = new DateTime();
    	if ($request->hasFile('Hinh')) {
    		$file = $request->Hinh;
    		$duoi = $file->getClientOriginalExtension();
    		if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
    			return redirect('admin/slide/them')->with('loi', 'Chỉ chấp nhận file ảnh .jpg, .jpeg .png!');
    		}
    		$filename = $file->getClientOriginalName();
    		$Hinh = str_random(4)."_".$filename;
    		while (file_exists("upload/slide/".$Hinh)) {
    		    $Hinh = str_random(4)."_".$filename;
    		}
    		unlink('upload/slide/'.$slide->Hinh);
    		$file->move('upload/slide', $Hinh);
    		$slide->Hinh = $Hinh;
    	}
    	$slide->save();
    	return redirect('admin/slide/sua/'.$slide->id)->with('thongbao', "Sửa thành công!");
    }

    public function getXoa($id)
    {
    	$slide = Slide::find($id);
    	$slide->delete();

    	return redirect('admin/slide/danhsach')->with('thongbao', "Xóa thành công!");
    }
}
