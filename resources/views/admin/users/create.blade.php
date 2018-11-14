@extends('admin.master')
@section('content')
<section class="content-header">
	<h1>
	    Quản lý user
	    <small>Thêm</small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="backend"><i class="fa fa-dashboard"></i> Home</a></li>	    
	    <li class="active">Quản lý user</li>
	</ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			@if($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			<form action="{{ isset($admin) ? route('admin.edit.user', $admin->id) : route('admin.create.user') }}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="col-md-6">
					<div class="form-group">
                        <label for="exampleInputFile">Ảnh</label>                        
                        
                        <p><img src="{{ asset(@$admin->photo) }}" class="image_upload_preview" style="width:150px;" alt=""></p>
                        
                        <input type="file" name="photo" class="inputFile" id="">
                        
                    </div>
					<div class="form-group">
						<label for="">Tên</label>
						<input type="text" class="form-control" name="name" value="{{ old('name', isset($admin) ? $admin->name : '') }}">
					</div>
					<div class="form-group">
						<label for="">Tên đăng nhập</label>
						<input type="text" class="form-control" name="username" value="{{ old('username', isset($admin) ? $admin->username : '') }}">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" name="password" placeholder="{{ isset($admin) ? '******' : '' }}">
					</div>
					<div class="form-group">
						<label for="">Số điện thoại</label>
						<input type="text" class="form-control" name="phone" value="{{ old('phone', isset($admin) ? $admin->phone : '') }}">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email" value="{{ old('email', isset($admin) ? $admin->email : '') }}">
					</div>
					<div class="form-group">
						<label for="">Địa chỉ</label>
						<input type="text" class="form-control" name="address" value="{{ old('address', isset($admin) ? $admin->address : '') }}">
					</div>
					<div class="form-group">
						<label for="">Quyền</label>
						<select name="authorization[]" multiple class="form-control" size="16">
							<option value="">--Chọn quyền--</option>
							@foreach($authSelector as $k => $auth)
							<option value="{{$k}}" {{ @$admin->authorization[$k] ? 'selected' : '' }}>{{ $auth }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">
                            Submit
                        </button>
					</div>
				</div>
			</form>
		</div>
	</div>
	
</section>
@endsection