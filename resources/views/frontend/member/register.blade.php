@extends('frontend.layouts.masterpage')
@section('container')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
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
						<h2>Register to your account</h2>
						<form action="#" method="POST">
                            @csrf
							<input type="text" placeholder="Full Name" name="name"/>
							<input type="text" placeholder="email" name="email"/>
                            <input type="password" placeholder="pass" name="password"/>
                            <input type="password" placeholder="Re-pass" name="repassrg"/>
                            <input type="text" placeholder="phone number" name="phone"/>
                            <input type="text" placeholder="address" name="address"/>
							
							<button type="submit" class="btn btn-default" style="float: right;margin-top:0px;">Register</button>
							<a href="{{ url('/member-login') }}" class="btn btn-default" style="float: left;margin-top:0px;">Back</a>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection