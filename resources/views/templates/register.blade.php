@extends('index')
@section('content')
<form action="{{ route('member.postRegister') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	{{ csrf_field() }}	
	<div class="box-register col-md-6 col-md-offset-3">
		@if(session('message'))
			<div class="alert alert-success">
			 	<strong>{{ session('message') }}</strong>
			</div>
		@endif
		<h1>Đăng ký thành viên</h1>
		<div class="form-group">
			<label for="">Họ và tên:</label>
			<input type="text" name="name" required="" class="form-control">
			@if ($errors->first('name')!='')
                <label class="control-label" for="inputError" style="color: red">
                  <i class="fa fa-times-circle-o"></i> 
                  {!! $errors->first('name'); !!}
                </label>
            @endif
		</div>
		<div class="form-group">
			<label for="">Số điện thoại:</label>
			<input type="text" name="phone" required="" class="form-control">
			@if ($errors->first('phone')!='')
                <label class="control-label" for="inputError" style="color: red">
                  <i class="fa fa-times-circle-o"></i> 
                  {!! $errors->first('phone'); !!}
                </label>
            @endif
		</div>
		<div class="form-group">
			<label for="">Email:</label>
			<input type="email" name="email" required="" class="form-control">
			@if ($errors->first('email')!='')
                <label class="control-label" for="inputError" style="color: red">
                  <i class="fa fa-times-circle-o"></i> 
                  {!! $errors->first('email'); !!}
                </label>
            @endif
		</div>
		<div class="form-group">
			<label for="">Địa chỉ:</label>
			<input type="text" name="address" required="" class="form-control">
			@if ($errors->first('address')!='')
                <label class="control-label" for="inputError" style="color: red">
                  <i class="fa fa-times-circle-o"></i> 
                  {!! $errors->first('address'); !!}
                </label>
            @endif
		</div>
		<div class="form-group">
			<label for="">Tên đăng nhập</label>
			<input type="text" name="username" required="" class="form-control">
			@if ($errors->first('username')!='')
                <label class="control-label" for="inputError" style="color: red">
                  <i class="fa fa-times-circle-o"></i> 
                  <span>{!! $errors->first('username'); !!}</span>
                </label>
            @endif
		</div>
		<div class="form-group">
			<label for="">Mật khẩu:</label>
			<input type="password" name="password" required="" class="form-control">
			@if ($errors->first('password')!='')
                <label class="control-label" for="inputError" style="color: red">
                  <i class="fa fa-times-circle-o"></i> 
                  {!! $errors->first('password'); !!}
                </label>
            @endif
		</div>
		<div class="form-group">
			<label for="">Ảnh đại diện</label>
			<input type="file" name="avartar_member">
		</div>
		<div class="form-group btn-register-member">
			<input type="submit" name="" value="Đăng ký" class="btn btn-primary">
		</div>
	</div>
</form>
@endsection