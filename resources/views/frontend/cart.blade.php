@extends('frontend.layouts.masterpage')
@section('container')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
            </div>
            
			<div class="table-responsive cart_info">
				@if(isset($product))
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
					<tbody>
					@php $tong = 0; @endphp
							@foreach($product as $val)
								<tr id="{{$val['id']}}">
									<td class="cart_product">
											@php $images = json_decode($val['image'],true); @endphp
											@if(is_array($images) && !empty($images))
												<a href=""><img src="/upload/user/product/{{$val['id_user']}}/{{$images[0]}}" style="width: 100px;" alt=""></a>
											@endif
									</td>
									<td class="cart_description">
										<h4><a href="">{{$val['name']}}</a></h4>
										<p id="{{$val['id']}}" class="getid">Web ID: {{$val['id']}}</p>
									</td>
									<td class="cart_price">
										<p class="price">{{$val['price']}}</p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up"> + </a>
											@foreach($getSS as $val_ss)
												<p  class="getidss" id="{{$val['id']}}" style="display: none;"></p>
												@if($val['id'] == $val_ss['id_product'])
													<input class="cart_quantity_input" type="text" name="quantity" value="{{$val_ss['qty']}}" autocomplete="off" size="2">
												@endif
											@endforeach
											<a class="cart_quantity_down" > - </a>
										</div>
									</td>
									<td class="cart_total">
											@foreach($getSS as $val_ss)
												@if($val['id'] == $val_ss['id_product'])
													<p class="cart_total_price">{{$val_ss['qty'] * $val['price']}}</p>
											@php $tong = $tong + ($val_ss['qty'] * $val['price']) @endphp
												@endif
											@endforeach
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" ><i class="fa fa-times"></i></a>
									</td>
								</tr>
							@endforeach
					@else
						<h3 style="text-align: center;">Hiện không có sản phầm nào trong giỏ hàng</h3>
					@endif
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>$59</span></li>
							<li>Eco Tax <span>$2</span></li>
							<li>Shipping Cost <span>Free</span></li>
							@if(isset($tong))
							<li>Total <span id="total">{{$tong}}</span></li>
							@else
							<li>Total <span id="total">0</span></li>
							@endif
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<a class="btn btn-default check_out" href="">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection
@section('script')
	<script>
		$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			var gettotal = 0;
			$('a.cart_quantity_up').click(function(){
				var getId = $(this).closest('tr').attr('id');
				var getprice = $(this).closest('tr').find('.price').text();
				var total = $('span#total').text();
				$('span#total').text(parseInt(total)+parseInt(getprice))
				$.ajax({
					method: "POST",
					url: '/cart_ajax_cong',
					data: 	{
							id_product: getId
							},
					success:function(data){
						gettotal = getprice*data;
						$('tr#'+getId).find('.cart_quantity_input').attr('value',data);
						$('tr#'+getId).find('.cart_total_price').text(gettotal);
					}
				})
				
			})

			$('a.cart_quantity_delete').click(function(){
				var getId = $(this).closest('tr').attr('id');
				var gettotal = $(this).closest('tr').find('.cart_total_price').text();
				var total = $('span#total').text();
				$('span#total').text(parseInt(total)-parseInt(gettotal))
				$('tr#'+getId).hide();
				$.ajax({
					method: "POST",
					url: '/cart_ajax_delete',
					data: 	{
							id_product: getId
							},
					success:function(data){
						alert(data);
					}
				})
			})
			$('a.cart_quantity_down').click(function(){
				var getId = $(this).closest('tr').attr('id');
				var getprice = $(this).closest('tr').find('.price').text();
				var total = $('span#total').text();
				$('span#total').text(parseInt(total)-parseInt(getprice))
				$.ajax({
					method: "POST",
					url: '/cart_ajax_tru',
					data: 	{
							id_product: getId
							},
					success:function(data){
						$('tr#'+getId).find('.cart_quantity_input').attr('value',data);
						$('tr#'+getId).find('.cart_total_price').text(getprice*data);
						if(data == 0){
							$('tr#'+getId).hide();
						}

					}
				})
			})
			
		})
	</script>
@endsection