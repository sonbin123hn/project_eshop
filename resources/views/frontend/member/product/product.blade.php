@extends('frontend.layouts.masterpage')
@section('container')
<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											My Product
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
                                            <li><a href="{{route('frontend.member.product.add')}}">Add Products</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							
							
							
						</div><!--/category-products-->
					
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">My Products</h2>
							@if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('success')}}
                                </div>
                            @endif
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td>Id</td>
										<td>Name</td>
										<td>Image</td>
										<td>Price</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
									@foreach ($product as $value)
									<tr>
										<td>{{$value['id']}}</td>
										<td>{{$value['name']}}</td>
										@php $images = json_decode($value->image,true); @endphp
											@if(is_array($images) && !empty($images))
												<td><img src="/upload/user/product/{{$value['id_user']}}/{{$images[0]}}" style="width: 100px;" alt=""></td>
											@endif
										<td>{{$value['price']}}</td>
										<td>
										<a href="{{ route('frontend.member.product.destroy', ['id' => $value['id']]) }}" onclick="return confirm('ban muon xoa san pham nay chu?')">xoa
										<a href="{{ route('frontend.member.product.edit', ['id' => $value['id']]) }}">sua</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
@endsection