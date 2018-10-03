@extends('admin.layout.index')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}} <br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('loi'))
                        <div class="alert alert-danger">
                            {{session('loi')}}
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/user/them" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tài khoản</label>
                                <input class="form-control" name="Username" placeholder="Please Enter User Name" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" type="password" name="Password" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input class="form-control" type="password" name="password_confirm" placeholder="Please Re-enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control" name="level">
                                    <option value="0">Khách</option>
                                    <option value="1">Admin</option>
                                </select>
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