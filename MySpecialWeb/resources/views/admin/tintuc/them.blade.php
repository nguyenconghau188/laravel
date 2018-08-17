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
                        <form action="" method="POST">
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
                                <input class="form-control" name="TomTat" placeholder="Vui lòng nhập tóm tắt" />
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh</label>
                                <input class="form-control" name="txtOrder" placeholder="Please Enter Category Keywords" />
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <select class="form-control" name="NoiBat">
                                    <option value="0">Không</option>
                                    <option value="1">Có</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-default">Category Add</button>
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