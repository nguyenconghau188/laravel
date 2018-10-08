@extends('client.layout.index')

@section('content')
	    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Author -->
                <p class="lead">
                    <small>post by <a href="">Admin</a></small>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->HinhAnh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead"><strong>{!!$tintuc->TomTat!!}</strong></p>
                <p class="lead">{!!$tintuc->NoiDung!!}</p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                	$comments = $tintuc->comment;
                ?>
                @foreach($comments as $cmt)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="upload/my_image/user.png" alt="" style="width: 64px; height: 64px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cmt->user->name}}
                            <small>{{$cmt->created_at ? date_format($cmt->created_at, 'h:m:s d-m-Y') : ''}}</small>
                        </h4>
                        {!!$cmt->NoiDung!!}
                    </div>
                </div>
				@endforeach
            </div>

            
            <div class="col-md-3">
				<!-- Tin lien quan -->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tlq)
	                        <div class="row" style="margin-top: 10px;">
	                            <div class="col-md-5">
	                                <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html">
	                                    <img class="img-responsive" src="upload/tintuc/{{$tlq->HinhAnh}}" alt="">
	                                </a>
	                            </div>
	                            <div class="col-md-7">
	                                <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}.html"><b>{{$tlq->TieuDe}}</b></a>
	                            </div>
	                            <p><small>{!!$tlq->TomTat!!}</small></p>
	                            <div class="break"></div>
	                        </div>
                        @endforeach
                        <!-- end item -->

                    </div>
                </div>
                <!-- end Tin lien quan -->

				<!-- Tin noi bat -->
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinnoibat as $tnb)
	                        <div class="row" style="margin-top: 10px;">
	                            <div class="col-md-5">
	                                <a href="tintuc/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}.html">
	                                    <img class="img-responsive" src="upload/tintuc/{{$tnb->HinhAnh}}" alt="">
	                                </a>
	                            </div>
	                            <div class="col-md-7">
	                                <a href="tintuc/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}.html"><b>{{$tnb->TieuDe}}</b></a>
	                            </div>
	                            <p><small>{!!$tnb->TomTat!!}</small></p>
	                            <div class="break"></div>
	                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
                <!-- end Tin noi bat -->
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection