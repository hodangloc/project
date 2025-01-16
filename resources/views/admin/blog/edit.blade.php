@extends('admin.layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-navbarbg="skin6" data-theme="light" data-layout="vertical" data-sidebartype="full" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
<div class="table-responsive">
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
 <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    
    @foreach ($blog as $value) 
    <form method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
        @csrf 
        <div class="col-md-12">
        	<label class="col-md-12">Title</label>
            <input type="text" name="title" value="{{ $value->title }}" class="form-control form-control-line">
            <br>
        </div>
        <div class="col-md-12">
        	<label class="col-md-12">Image</label>
            <img src="{{ asset('uploads/blog/'. $value->image)}}" width="200px">
            <input type="file" name="image" class="form-control form-control-line">
            <br>
        </div>
        <div class="col-md-12">
        	<label class="col-md-12">Description</label>
        	<textarea name="description" class="form-control form-control-line">{{ $value->description }}</textarea>       
            <br>
        </div>
        <div class="col-md-12">
        	<label class="col-md-12">Content</label>
        	<textarea name="content" id="content" class="form-control form-control-line">{{ $value->content }}</textarea>       
            <br>
        </div>
        <button id="button">Update Blog</button>
    </form>
    @endforeach
</div>

@endsection