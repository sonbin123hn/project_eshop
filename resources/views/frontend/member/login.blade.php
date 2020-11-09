@extends('frontend.layouts.masterpage')
@section('container')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
				@if(session('abc'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('abc')}}
                                </div>
                            @endif
                    @if($errors->any())
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST">
							@csrf
							<input type="text" placeholder="email" name="email"/>
							<input type="password" placeholder="pass" name="pass"/>
							
							<button type="submit" class="btn btn-default" style="float: right;margin-top:0px;">Login</button>
							<a href="{{ url('/member-register') }}" class="btn btn-default" style="float: left;margin-top:0px;">Register</a>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection