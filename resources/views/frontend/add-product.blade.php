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
				<form action="#" method="POST" enctype="multipart/form-data">
				@csrf
					<input type="text" name="name" placeholder="Name"/>
					<input type="text" name="price" placeholder="Price"/>
					<select name="category">	
						<option>Please choose category</option>
	                        @foreach ($category as $cat){
	                    		<option value="{{ $cat->id }}">{{ $cat->name }}</option>
							@endforeach
                    </select>	
                    <select name="brand">				
                   		<option>Please choose brand</option>
	                        @foreach ($brand as $bra){
	                    		<option value="{{ $bra->id }}">{{ $bra->name }}</option>
							@endforeach
					</select>
					<select class="status" name="status">   
                        <option value="0" >New</option>
                        <option value="1" >Sale</option>
                    </select>
                    <div class="input-container" id="input-container" style="display: none;"  >
                    	<div class="input">
		                	<input type="number" placeholder="0" name="sale" />
							<span>%</span>		  		
                    	</div>
                    </div>
					<input type="text" name="company" placeholder="Company profile"/>
					<input type="file" name="img[]" id="img" placeholder="No file chosen" multiple/>
					<textarea placeholder="Detail" name="detail" ></textarea>
					<button type="submit" class="btn btn-default">Signup</button>
				</form>
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