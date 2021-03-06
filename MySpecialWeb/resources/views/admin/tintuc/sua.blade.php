@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token ()}}">
                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        {{$error}} <br>
                                    @endforeach
                                </div>
                            @endif

                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif

                            @if(session('loi'))
                                <div class="alert alert-danger">
                                    {{session('loi')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option
                                        @if($tl->id == $tintuc->loaitin->theloai->id)
                                            {{"selected"}}
                                        @endif
                                         value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option
                                        @if($lt->id == $tintuc->loaitin->id)
                                            {{"selected"}}
                                        @endif
                                         value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Vui lòng nhập thể loại" value="{{$tintuc->TieuDe}}" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control ckeditor" name="TomTat">
                                    {{$tintuc->TomTat}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control ckeditor" name="NoiDung">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <div class="form-group">
                                    <img src="upload/tintuc/{{$tintuc->HinhAnh}}" alt="" width="100px" align="left">
                                    <input type="file" class="form-control" name="HinhAnh" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Category Status</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" 
                                        @if($tintuc->NoiBat == 0)
                                            {{"checked"}}
                                        @endif
                                     type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0"
                                        @if($tintuc->NoiBat == 1)
                                            {{"checked"}}
                                        @endif
                                     type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa tin</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <small>Comments</small>
                        </h1>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>UserID</th>
                                <th>Username</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>     
                            @foreach($tintuc->comment as $cmt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$cmt->id}}</td>
                                    <td>{{$cmt->idUser}}</td>
                                    <td>{{$cmt->user->name}}</td>
                                    <td>{{$cmt->NoiDung}}</td>
                                    <td>{{$cmt->created_at}}</td>
                                    <td>{{$cmt->updated_at}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/xoa/{{$cmt->id}}/{{$cmt->idTinTuc}}">Xóa</a></td>
                                </tr>
                            @endforeach                          
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
           $('#TheLoai').change(function() {
               var idTheLoai = $('#TheLoai').val();
               $.get("admin/ajax/loaitin/"+idTheLoai, function(data){
                    $("#LoaiTin").html(data);
               });
           });
        });
        if ($("#TheLoai").val() == null)
        {
            $("#LoaiTin").change(function(){
                var idLoaiTin = $("#LoaiTin").val();
                $.get("admin/ajax/theloai/"+idLoaiTin, function(data){
                    $("#TheLoai").html(data);
                });
            });
        }
    </script>
@endsection