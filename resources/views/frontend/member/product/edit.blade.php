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
						<h2 class="title text-center">Add Product</h2>
						<div class="product">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                    {{session('success')}}
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
                                        <label class="col-md-12">Name product</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name"  value="{{$product['name']}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                        <div class="col-md-12">
                                            <input type="text"    class="form-control form-control-line" name="price"  value="{{$product['price']}}" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Category</label>
                                        <div class="col-sm-12">
                                            <select name="id_category" class="form-control form-control-line">
                                                @foreach($category as $val_category)
                                                    <option value="{{ $val_category['id'] }}" <?php echo $product['id_category'] == $val_category['id'] ? 'selected':''; ?>>{{ $val_category['category'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Select Brand</label>
                                        <div class="col-sm-12">
                                            <select name="id_brand" class="form-control form-control-line">
                                                @foreach($brand as $val_brand)
                                                    <option value="{{ $val_brand['id'] }}" <?php echo $product['id_brand'] == $val_brand['id'] ? 'selected':''; ?>>{{ $val_brand['brand'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-12">Sale</label>
                                        <div class="col-sm-12">
                                            <select name="trangthaisp" id="trangthaisp" class="form-control form-control-line">
                                                    <option id="sale" value="1">sale</option>
                                                    <option value="0">new</option>
                                            </select>
                                        </div>
                                        <div id="phantram" class="col-md-6" style="display: none;">
                                            <input name="sale" value="{{$product['sale']}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Company</label>
                                        <div class="col-md-12">
                                            <input name="company"  value="{{$product['company']}}" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">avatar</label>
                                        <div class="col-md-12">
                                            <input type="file" name="image[]" multiple>
                                                @foreach($images as $val_image)
                                                    <input type="checkbox" name="file[]" value="{{$val_image}}">
                                                    <label for="image_1"></label><img src="/upload/user/product/{{$product['id_user']}}/{{$val_image}}" style="width: 50px;" alt=""><br>
                                                @endforeach
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Detail</label>
                                            <div class="col-md-12">
                                                <textarea name="detail" value="{{$product['detail']}}" cols="30" rows="10">{{$product['detail']}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">Edit Product</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
						
					</div><!--features_items-->
					
					
					
				</div>
			</div>
		</div>
@endsection
@section('script')
<Script>
    $(document).ready(function(){
        var sale = $(this).val();
        console.log('abc');
        if(sale == "1"){
                $('#phantram').show();
            }else{
                $('#phantram').hide();
            }
        $('#trangthaisp').click(function(){
            var sale = $(this).val();
            console.log(sale);
            if(sale == "1"){
                $('#phantram').show();
            }else{
                $('#phantram').hide();
            }
        })

    })
</Script>
@endsection