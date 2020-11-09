@extends('frontend.layouts.masterpage')
@section('container')
<div class="container">
			<div class="row">
				<div class="col-sm-3">

					<div class="left-sidebar">
						<h2>Account</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a  href="{{ url('/account')}}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Account
										</a>
									</h4>
								</div>
								
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a id="products" href="{{ url('/account/product') }}">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											My Products
										</a>
									</h4>
								</div>
							</div>
						</div><!--/category-products-->
                    </div>
                    
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Account</h2>
						<div class="account">
							<div class="card-body" style="float: left;">
                                <img src="/upload/{{ $account->avatar }}" class="rounded-circle" width="250" />
                            </div>
                            @if(session('abc'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('abc')}}
                                </div>
                            @endif
                            <!-- hien thi loi request -->
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
                            <form method="POST" style="width: 60%;float: right;padding-bottom: 50px;" enctype="multipart/form-data">
                            @csrf
							<div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" value="{{ $account->name }}" placeholder="Vui long nhap username" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email"  readonly value="{{ $account->email }}" class="form-control form-control-line" name="example-email" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password"  name="password" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" value="{{ $account->phone }}" placeholder="vui long nhap sdt" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <input type="text" value="{{ $account->address }}" name="address" placeholder="vui long nhap dia chi" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">avatar</label>
                                        <div class="col-md-12">
                                            <input type="file" name="avatar" >
                                    </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Country</label>
                                        <div class="col-sm-12">
                                            <select name="id_country" class="form-control form-control-line">
                                                @foreach($country as $value)
                                                    <option value="{{ $value['id'] }}" <?php echo $account->id_country == $value['id'] ? 'selected':''; ?>>{{ $value['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
						
					</div><!--features_items-->
					
					
					
				</div>
			</div>
		</div>
@endsection