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
		<div class="row">
			<div class="col-sm-9">
				<div class="blog-post-area">
					<h2 class="title text-center">Update user</h2>
					 <div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="#" method="POST" enctype="multipart/form-data">
					@csrf
						<input type="text" placeholder="Name" name="name" value="{{ $user->name }}">
						<input type="email" placeholder="Email Address" name="email" value="{{ $user->email }}">
						<input type="password" placeholder="Password" name="password" value="{{ $user->password }}" >
						<input type="number" placeholder="Phone no" class="form-control form-control-line" name="phone" value="{{ $user->phone }}"> 
						<input type="text" placeholder="Country" name="country" value="{{ $user->country }}">
						<input type="file" placeholder="Avatar" name="avatar" value="{{ $user->avatar }}">
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection