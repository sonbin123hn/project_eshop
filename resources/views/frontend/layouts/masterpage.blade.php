<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home | E-Shopper</title>

    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('frontend/css/rate.css')}}">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">

    <script src="{{ asset('frontend/js/jquery.js')}}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
 
    @yield('script')
</head><!--/head-->

<body>

	@include('frontend.layouts.header')
	
	@yield('slide')
	
	@yield('container')
	
	@include('frontend.layouts.footer')
	
    
    <script src="{{ asset('frontend/js/price-range.js')}}"></script>

<script src="{{ asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{ asset('frontend/js/main.js')}}"></script>

<script>
    $(document).ready(function(){   
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.slider-track').click(function(){
            var getPrice = $('.tooltip-inner').text();
            console.log(getPrice);
            $.ajax({
                method: "POST",
                url: '/ajax_search',
                data: 	{
                        getPrice: getPrice
                        },
                success:function(data){
                    var html = ''
                    var product = JSON.parse(JSON.stringify(data));
                    var arr = product['product'];

                    Object.keys(arr).map(function(keyss,indexx){
                     
                        var image = JSON.parse(arr[keyss]['image']);
                        
                        html += "<div class='col-sm-4'>"+
									"<div class='product-image-wrapper'>"+
										"<div class='single-products'>"+
											"<div class='productinfo text-center'>"+
											"<img src="+'/upload/user/product/'+arr[keyss]['id_user']+'/'+image[0] +" />"+
                                                    "<h2>"+arr[keyss]['price']+"</h2>"+
                                                    "<p>"+arr[keyss]['name']+"</p>"+
                                                "<a href='#' id="+arr[keyss]['id']+" class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>"+
                                            "</div>"+
                                            "<div class='product-overlay'>"+
                                                "<div class='overlay-content'>"+
                                                    "<h2>"+arr[keyss]['price']+"</h2>"+
                                                    "<p>"+arr[keyss]['name']+"</p>"+
                                                    "<a id="+arr[keyss]['id']+" class='btn btn-default add-to-cart'><i class='fa fa-shopping-cart'></i>Add to cart</a>"+
                                                "</div>"+
                                            "</div>"+
										"</div>"+
										"<div class='choose'>"+
											"<ul class='nav nav-pills nav-justified'>"+
												"<li><a href='#'><i class='fa fa-plus-square'></i>Add to wishlist</a></li>"+
												"<li>" +
                                                 "</li>"+
											"</ul>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>";
                    })
                    $('.features_items').html(html);

                }
            })
        })
    })
</script>
</body>
</html>
