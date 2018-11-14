@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Quản lý user
    <small>Cập nhật</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="backend"><i class="fa fa-dashboard"></i> Home</a></li>    
    <li class="active">Quản lý user</li>
  </ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<form action="{{ route('admin.admin.edit', $data->id) }}" method="post">
				{{ csrf_field() }}
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Tên</label>
						<input type="text" class="form-control" name="name" value="{{ $data->name }}">
					</div>
					<div class="form-group">
						<label for="">Tên đăng nhập</label>
						<input type="text" class="form-control" name="username" value="{{ $data->username }}">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" name="password" value="{{ $data->password }}">
					</div>
					<div class="form-group">
						<label for="">Số điện thoại</label>
						<input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email" value="{{ $data->email }}">
					</div>
					<div class="form-group">
                        <label>
				        	<input type="checkbox" name="active" @if($data->active ==1) checked @endif>
				        	Kích hoạt
				    	</label>
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