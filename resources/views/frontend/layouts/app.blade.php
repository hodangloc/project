<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home | E-Shopper</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('frontend/css/rate.css') }}" type="text/css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{ asset('frontend/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('frontend/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('frontend/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('frontend/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('frontend/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <link rel="stylesheet" href="path/to/prettyPhoto.css">
    <style type="text/css">
    	.hide{
    		display: none;
    	}
    	.show{
    		display: block;
    	}
    
        .input {
            display: flex;
            align-items: center;
        }
        .input {
            width: 150px;
        }
        .input span {
            margin-left: 5px;
        }
     	select{
     		padding: 5px;
     		font-size: 14px;
     	}
    </style>

</head><!--/head-->

<body>
	
	@include('frontend.layouts.header')

	<?php 
		$routename = Route::current()->getName();
		if (str_contains($routename, 'home')) {
	?>
		@include('frontend.layouts.slide')
	<?php 
		}
	?>
	<section>
		<div class="container">
			<div class="row">
				<?php 
					$routename = Route::current()->getName();
					if (str_contains($routename, 'account')) {		
				?>
					@include('frontend.layouts.menu-left')
				<?php 
					}
				?>
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
				
			</div>
		</div>
	</section>

	@include('frontend.layouts.footer')

	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
	<script src="{{ asset('frontend/js/price-range.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
	<script src="{{ asset('frontend/js/main.js') }}"></script>
	<script src="path/to/jquery.min.js"></script>
	<script src="path/to/jquery.prettyPhoto.js"></script>
	@yield('js')
</body>
</html>