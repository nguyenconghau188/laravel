@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST" enctype="multipart/form-data">
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
                                    <option disabled selected value> -- Vui lòng chọn thể loại -- </option>
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại Tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    <option disabled selected value> -- Vui lòng chọn loại tin -- </option>
                                    @foreach($loaitin as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Vui lòng nhập tiêu đề" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea class="form-control ckeditor" name="TomTat" id="TomTat" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control ckeditor" name="NoiDung" id="NoiDung" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input type="file" class="form-control" name="HinhAnh" />
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="0" checked="" type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="NoiBat" value="1" type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
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