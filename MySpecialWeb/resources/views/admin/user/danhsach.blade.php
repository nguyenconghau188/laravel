@extends('admin.layout.index')

@section('content')

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                            <tr class="even gradeC" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->level == 1)
                                        {{"Admin"}}
                                    @else
                                        {{"Khách"}}
                                    @endif
                                </td>
                                <td>{{$user->created_at ? date_format($user->created_at, 'd-m-Y') : ''}}</td>
                                <td>{{$user->updated_at ? date_format($user->updated_at, 'd-m-Y') : ''}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$user->id}}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$user->id}}">Sửa</a></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection