@extends('frontend.layouts.masterpage')
@section('container')
<section>
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
											Sportswear
										</a>
									</h4>
								</div>
								<div id="sportswear" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Nike </a></li>
											<li><a href="">Under Armour </a></li>
											<li><a href="">Adidas </a></li>
											<li><a href="">Puma</a></li>
											<li><a href="">ASICS </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#mens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Mens
										</a>
									</h4>
								</div>
								<div id="mens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
											<li><a href="">Armani</a></li>
											<li><a href="">Prada</a></li>
											<li><a href="">Dolce and Gabbana</a></li>
											<li><a href="">Chanel</a></li>
											<li><a href="">Gucci</a></li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#womens">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Womens
										</a>
									</h4>
								</div>
								<div id="womens" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a href="">Fendi</a></li>
											<li><a href="">Guess</a></li>
											<li><a href="">Valentino</a></li>
											<li><a href="">Dior</a></li>
											<li><a href="">Versace</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Kids</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Fashion</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Households</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Interiors</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Clothing</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Bags</a></h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#">Shoes</a></h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
									<li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
									<li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
									<li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
									<li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
									<li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
									<li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b>$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					</div>
				</div>
				
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
						<h3>{{$blog->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i>{{  $blog['user']->name }}</li>
									<li><i class="fa fa-clock-o"></i>time {{ $blog['updated_at']->format('H:i') }}</li>
									<li><i class="fa fa-calendar"></i> DEC {{ $blog['updated_at']->format('m-Y') }}</li>
								<span>
								@for ($i = 1; $i <= 5; ++$i)
									@if($i <= $tbc)
									<i class="fa fa-star"></i>
									@else
									<i class="fa fa-star-o"></i>
									@endif
								@endfor 
								</span>
							</div>
							{!! $blog->content !!}
							<div class="pager-area">
								<ul class="pager pull-right">
									@if(!empty($previous))
									<li><a href="{{ URL::to( 'blog/detail/' . $previous ) }}">Pre</a></li>
									@endif
									
									@if(!empty($next))
									<li><a href="{{ URL::to( 'blog/detail/' . $next ) }}">Next</a></li>
									@endif
								</ul>
							</div>
						</div>
						
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<ul class="rate">
							
							<li class="rate-this">Rate this item:</li>
							<li class="vote">
								<div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
								<div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
								<div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
								<div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
								<div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
							</li>
							<li class="color">(5 votes)</li>

						</ul>
						
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="images/blog/socials.png" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="images/blog/man-one.jpg" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="response-area">
						<h2>{{count($comment)}} RESPONSES</h2>
						<ul class="media-list">
							@foreach($comment as $value)
							
								@if($blog['id'] == $value['id_blog'])
									@if($value['id_cmt'] == 0)
									<li class="media">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{ URL::to('/upload/'.$value['avata']) }}" style="width: 100px;" alt="">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>{{$value['name']}}</li>
												<li><i class="fa fa-clock-o"></i> time {{ $value['updated_at']->format('H:i') }}</li>
												<li><i class="fa fa-calendar"></i> DEC {{ $value['updated_at']->format('m:Y') }}</li>
											</ul>
											<p>{{$value['cmt']}}</p>
											<a class="btn btn-primary replay"  href="#form"	 id="{{$value['id']}}"><i class="fa fa-reply"></i>Replay</a>
											
										</div>
									</li>
									@endif
									@foreach($comment as $value1)
										@if($value['id'] == $value1['id_cmt'])
											<li class="media second-media">
												<a class="pull-left" href="#">
													<img class="media-object" src="{{ URL::to('/upload/'.$value1['avata']) }}" style="width: 100px;" alt="">
												</a>
												<div class="media-body">
													<ul class="sinlge-post-meta">
														<li><i class="fa fa-user"></i>{{$value1['name']}}</li>
														<li><i class="fa fa-clock-o"></i> time {{ $value1['updated_at']->format('H:i') }}</li>
														<li><i class="fa fa-calendar"></i> DEC {{ $value1['updated_at']->format('m:Y') }}</li>
													</ul>
													<p>{{$value1['cmt']}}</p>
													<a class="btn btn-primary" href="#form"><i class="fa fa-reply"></i>Replay</a>
												</div>
											</li>
										@endif
									@endforeach
								@endif
							@endforeach
						</ul>					
					</div><!--/Response-area-->
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
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-8">
								<div class="text-area">
									<div class="blank-arrow">
										<label>Message</label>
									</div>
									<span>*</span>
									<form id="form" method="post">
									@csrf
										<textarea name="message" rows="11"></textarea>
										<input type="text" class="cmt_con" value="" name="id_cmt" style="display: none;">
										<button type="submit" class="btn btn-primary" id="comment">post comment</button>
									</form>
								</div>
							</div>
						</div>
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>
	
@endsection
@section('script')
<script>
		$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$('button#comment').click(function(){
				// goi php vao trong js de kiem tra login
			var loggedIn = "{{Auth::check()}}"; 
			console.log(loggedIn);
			if ( loggedIn == "" ){ 
	    		alert('Please to login before comment!');
	    		// console.log('asdasd');
	    	}else
				return true;
			}
			)
			$('a.replay').click(function(){
				// goi php vao trong js de kiem tra login
				var loggedIn = "{{Auth::check()}}"; 
				console.log(loggedIn);
				if ( loggedIn == "" ){ 
					alert('Please to login before comment!');
					// console.log('asdasd');
				}else{
					var getid = $(this).attr("id");
					$('input.cmt_con').val(getid);
					
					return true;
				}
			}
			)
			//vote
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			$('.ratings_stars').click(function(){
				var loggedIn = "{{Auth::check()}}";
				if ( loggedIn == "" ){ 
					alert('Please to login before comment!');
					// console.log('asdasd');
				}else{
					if ($(this).hasClass('ratings_over')) {
						$('.ratings_stars').removeClass('ratings_over');
						$(this).prevAll().andSelf().addClass('ratings_over');
					} else {
						$(this).prevAll().andSelf().addClass('ratings_over');
					}
					var Values =  $(this).find("input").val();
					var id_blog = "{{ $blog->id }}";
					$.ajax({
						method: "POST",
						url: '/blog/ajax_rate',
						data: 	{
								rate: Values,
								blog: id_blog
								},
						success:function(data){
							alert(data);
						}
					})

				}

			

		    });
			
		


		})
</script>
@endsection
