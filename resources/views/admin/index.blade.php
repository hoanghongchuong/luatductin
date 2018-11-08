@extends('admin.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Quản trị website 
    
  </h1>
  <!-- @if (Session::has('flash_notice'))
    <span class="box-title text-green alert_thongbao">{{ Session::get('flash_notice') }}</span>
  @endif -->
  <ol class="breadcrumb">
    <li><a href="{{ asset('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Data tables</li>
  </ol>
</section>
<!-- Main content -->
<section class="content"">
 <div class="content_img"><img src="{{ asset('public/admin_assets/images/banner.jpg') }}" class="img-responsive" alt=""></div>
<style type="text/css" media="screen">
  .content_img img {
    width: 100%;
    height: auto;
}
</style>
</section><!-- /.content -->
@endsection()