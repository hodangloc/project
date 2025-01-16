@extends('frontend.layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon fa fa-check">Thông báo!</i></h4>
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        <h4><i class="icon fa fa-check">Thông báo!</i></h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<section>
	<div class="container">
		<div class="col-sm-9">
			<div class="blog-post-area">
				<h2 class="title text-center">Create product</h2>
				 <div class="signup-form"><!--sign up form-->
				<h2>Create Product!</h2>
					@foreach($product as $prod)
						@php
							$image = json_decode($prod['image'], true);
						@endphp
						<form action="#" method="POST" enctype="multipart/form-data">
						@csrf
							<input type="text" name="name" placeholder="Name" value="{{ $prod->name }}" />
							<input type="text" name="price" placeholder="Price" value="{{ $prod->price }}" />
							<select name="category">	
								<option>Please choose category</option>
	                        	@foreach ($category as $cat)
	                        		@php
	                        			$selected = $cat->id == $prod->id_category ? 'selected' : '';
	                        		@endphp
	                    				<option {{$selected}} value="{{ $cat->id }}">{{ $cat->name }}</option>      
								@endforeach
		                    </select>	
		                    <select name="brand">				
		                   		<option>Please choose brand</option>
	                        	@foreach ($brand as $bra)
	                        		@php
	                        			$selected2 = $bra->id == $prod->id_brand ? 'selected' : '';
	                        		@endphp                
	                    				<option {{$selected2}} value="{{ $bra->id }}">{{ $bra->name }}</option>
	                        	@endforeach
							</select>
							<select class="status" name="status"> 
		                        <option value="0" >New</option>
		                        <option value="1" >Sale</option>
		                    </select>
		                    <div class="input-container" id="input-container" style="display: none;"  >
		                    	<div class="input">
				                	<input type="text" placeholder="0" name="sale" value="{{ $prod->sale }}" />
									<span>%</span>		  		
		                    	</div>
		                    </div>
							<input type="text" name="company" placeholder="Company profile" value="{{ $prod->company }}"/>
							<input type="file" name="img[]" id="img" placeholder="No file chosen" multiple/>
								<div class="checkbox-container">
									@foreach ($image as $img)
									    <label class="checkbox-wrapper">
									        <img src="{{ asset('uploads/product/'. $img) }}" alt="Image 1" width="100px">
									        <input type="checkbox" name="imgDel[]" value="{{$img}}">
									    </label>
								    @endforeach
								</div>
							<textarea placeholder="Detail" name="detail" ></textarea>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	
</section>

@endsection

@section('js')

<script>
	$(document).ready(function(){
		$(".status").click(function(){
			x = $(this).val();
			console.log(x);
			if (x == 0) {
				$(".input-container").hide();
			}
			else{
				$(".input-container").show();
			}
		})
	});
</script>

@endsection