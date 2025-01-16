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
<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
					
					<form action="" method="POST">
					@csrf
						<input type="email" name="email" placeholder="Email Address" />
						<input type="password" name="password" placeholder="Password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Keep me signed in
						</span>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection