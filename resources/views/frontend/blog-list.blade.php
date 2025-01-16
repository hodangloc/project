
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
						<img src="{{ ('frontend/images/home/shipping.jpg')}}" alt="" />
					</div><!--/shipping-->
				</div>
			</div>
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Latest From our Blog</h2>
					@foreach($blog as $value){
						<div class="single-blog-post">
							<h3>{{ $value->title }}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="">
								<img src="{{ asset('uploads/blog/'. $value->image)}}" alt="">
							</a>
							<p>{{ $value->content }}</p>
							<a  class="btn btn-primary" href="{{ url('/blog-single/'. $value->id)}}">Read More</a>
						</div>
					@endforeach
					<div class="pagination-area">
						{!! $blog->links('pagination::bootstrap-4') !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

