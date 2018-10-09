@extends('client.layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				  		
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

				    	<form action="nguoidung" method="POST">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1" value="{{$user_active->name}}">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1" value="{{$user_active->email}}"
							  	disabled
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" class="" name="checkpassword" id="changePassword" value="1">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control" name="password" id="password" aria-describedby="basic-addon1" value="{{$user_active->password}}" disabled>
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" id="passwordAgain" aria-describedby="basic-addon1" value="{{$user_active->password}}" disabled>
							</div>
							<br>
							<button type="submit" class="btn btn-default">Sửa
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->
@endsection

@section('script')
<script>
	$(document).ready(function() {
		$('#changePassword').change(function(){
			if ($(this).is(':checked')) {
				$('#password').removeAttr('disabled');
				$('#passwordAgain').removeAttr('disabled');
			}
			else {
				$('#password').attr('disabled', '');
				$('#passwordAgain').attr('disabled', '');
			}
		});
	});
</script>
@endsection