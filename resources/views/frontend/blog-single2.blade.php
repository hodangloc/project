@extends('frontend.layouts.app')

@section('content')

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
						<img src="{{ ('frontend/images/home/shipping.jpg') }}" alt="" />
					</div><!--/shipping-->
				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Latest From our Blog</h2>
					
					<div class="single-blog-post">
						<h3>{{ $blog['title'] }}</h3>
						<div class="post-meta">
							<ul>
								<li><i class="fa fa-user"></i> Mac Doe</li>
								<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
								<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
							</ul>
							<!-- <span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half-o"></i>
							</span> -->
						</div>
						<a href="">
							<img src="{{ asset('/uploads/blog/'. $blog['image']) }}" alt="">
						</a>
						<p>{{ $blog['content'] }}</p> 

						
						<div class="pager-area">
							<ul class="pager pull-right">	 
								@if ($pre) 
									<li><a href="{{ url('/blog-single2/'. $pre)}}">Pre</a></li>
								@endif
								
								@if ($next) 	
									<li><a href="{{ url('/blog-single2/'. $next)}} ">Next</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div><!--/blog-post-area-->

				<div class="rating-area">
					<ul class="ratings">
						<li class="rate-this">Rate this item:</li>
							<div class="rate">
				                <div class="vote">		
				                    <div class="star_1 ratings_stars"><input value="1" type="hidden"></div>
				                    <div class="star_2 ratings_stars"><input value="2" type="hidden"></div>
				                    <div class="star_3 ratings_stars"><input value="3" type="hidden"></div>
				                    <div class="star_4 ratings_stars"><input value="4" type="hidden"></div>
				                    <div class="star_5 ratings_stars"><input value="5" type="hidden"></div>
				                    <span class="rate-np">{{ $num }}</span>
			                	</div> 
			            	</div>
					</ul>
					<ul class="tag">
						<li>TAG:</li>
						<li><a class="color" href="">Pink <span>/</span></a></li>
						<li><a class="color" href="">T-Shirt <span>/</span></a></li>
						<li><a class="color" href="">Girls</a></li>
					</ul>
				</div><!--/rating-area-->

				<div class="socials-share">
					<a href=""><img src="{{ asset('frontend/images/blog/socials.png')}}" alt=""></a>
				</div><!--/socials-share-->

				<div class="media commnets">
					<a class="pull-left" href="#">
						<img class="media-object" src="{{ asset('frontend/images/blog/man-one.jpg')}}" alt="">
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
				</div> <!--Comments -->
				<div class="response-area">
					<h2>3 RESPONSES</h2>
					
					<ul class="media-list">  
						@foreach ($data as $value) 	
							@if($value['level'] == 0)
							<li class="media" >
								<a class="pull-left" href="">
									<img class="media-object" src="{{ asset('/uploads/user/avatar/'. $value['avatar_user']) }}" width="150px" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										<li><i class="fa fa-user"></i>{{ $value['name_user'] }}</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<p>{{ $value['cmt'] }}</p>
									<a class="btn btn-primary reply" id="{{ $value['id'] }}"><i class="fa fa-reply"></i>Reply</a>
									<br>
									<br>
									<div>
										<form method="POST" action="{{ route('blog.repcomment') }}" style="display:none;" class="form-reply" id="formReply">	
										@csrf				
											<div class="blank-arrow">
												<label>Reply comment</label>
											</div>
											<span></span>
											<input type="hidden" name="id_blog" value="{{ $blog['id'] }}">
											<input type="hidden" name="level" value="" class="idcmt">
											<textarea name="repComment" class="repComment" rows="2"></textarea>
											<p class="err2"></p>
											<button type="submit" class="btn btn-primary">Post Reply comment</button> 	
										</form>
									</div>
								</div>
							</li>	
							@foreach ($data as $key2 => $value2) 
								@if($value2['level'] == $value['id'])
									<li class="media second-media">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{ asset('/uploads/user/avatar/'. $value2['avatar_user']) }}" width="150px" alt="">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i><?php echo $value2['name_user']; ?></li>
												<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
												<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
											</ul>
											<p><?php echo $value2['cmt']; ?></p>	
										</div>
									</li>
								@endif
							@endforeach
						@endif
					@endforeach
					</ul>							
				</div><!--/Response-area-->
				<div class="replay-box">
					<div class="row">
						<form method="POST" action="{{ route('blog.comment2') }}" class="form-cmt">
							@csrf
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								<div class="text-area">
									<div class="blank-arrow">
										<label>Your Name</label>
									</div>
									<span></span>
									<input type="hidden" name="id_blog" value="{{ $blog['id'] }}">
									<input type="hidden" name="level" value="0" class="idcmt">
									<textarea name="comment" class="comment" rows="11"></textarea>
									<p class="err"></p>
									<button type="submit" class="btn btn-primary">Post comment</button> 
								</div>
							</div>
						</form>
					</div>
				</div><!--/Repaly Box-->
			</div>	
		</div>
	</div>
</section>

@endsection

@section('js')
<script>
	$(document).ready(function(){
		$.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
			var checkLogin = "{{ Auth::check() }}";

			if (checkLogin) {
				var rate =  $(this).find("input").val();
		        alert(rate);

		    	if ($(this).hasClass('ratings_over')) {
		            $('.ratings_stars').removeClass('ratings_over');
		            $(this).prevAll().andSelf().addClass('ratings_over');
		        } else {
		        	$(this).prevAll().andSelf().addClass('ratings_over');
		        }

		        $.ajax ({
		        	type: 'POST',
		        	url: '{{ url("/blog/rate/ajax") }}',
		        	data: {
		        		rate: rate,
		        		id_blog: "{{ $blog['id'] }}",
		        		id_user: "{{ Auth::id() }}",		   				
		        	},
		        	success:function(data){
		        		console(data);
		        	},
		        });
	        }else{
	        	alert("Vui lòng đăng nhập");
	        }	        
	    });

        $('.form-cmt').submit(function() {
        	var checkLogin = "{{ Auth::check() }}";

        	if (checkLogin) {
        		var getCmt = $("textarea.comment").val();

        		x = 0;

        		if (getCmt == "") {
        			x = 1;
        			$("p.err").text("Vui lòng nhập comment");
        		}else{
        			$("p.err").text("");
        		}
        		if (x == 0) {
        			$.ajax({
        				type: 'POST',
        				url: '{{ url("/blog/comment/ajax") }}',
        				data: {
        					cmt: getCmt,
        					id_blog: "{{ $blog['id'] }}",
        				},
        				success:function(data){
        					console.log(data);
        				},
        			});
        		}
        	}else{
        		alert("Vui lòng đăng nhập");
        	}
        });
 
    	$('.reply').click(function(){
    		$(".form-reply").removeAttr("style");

    		var getId = $(this).attr("id");
    			// alert(getId);
    			$(".idcmt").val(getId);
    		}); 	
		$(".form-reply").submit(function(){
    		var checkLogin = "{{ Auth::check() }}";
    		if (checkLogin) {
    			var repCmt = $("textarea.repComment").val();
    			y = 0;

    			if (repCmt == "") {
    				y = 1;
    				$("p.err2").text("Vui lòng nhập comment");
    			}else{
    				$("p.err2").text("");
    			}
    			if (y == 0) {
    				$.ajax({
    					type: 'POST',
    					url: '{{ url("/blog/repcomment/ajax") }}',
    					data: {
    						repComment: repCmt,
    						id_blog: "{{ $blog['id'] }}",
    						level: $(".idcmt").val(),
    					},
    					success:function(data){
    						console.log(data);
    						alert("Comment đã được gửi thành công!");
    					}
    				});
    			}
    		}else{
    			alert("Vui lòng đăng nhập");
    		}
    	});
    });

</script>

@endsection