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
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
						<input type="text" name="name" placeholder="Name"/>
						<input type="email" name="email" placeholder="Email Address"/>
						<input type="password" name="password" placeholder="Password"/>
                        <input type="phone" name="phone" placeholder="Phone No"/>
                        <input type="country" name="country" placeholder="Country"/> 
                        <input type="file" name="avatar" src="" class="form-control form-control-line">
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->

@endsection