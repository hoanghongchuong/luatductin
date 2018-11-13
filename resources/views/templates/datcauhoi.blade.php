@extends('index')
@section('content')

<div class="content-question">
	<div class="col-md-12">
		<form action="{{ route('postQuestion') }}" method="post" accept-charset="utf-8">
			{{ csrf_field() }}
			
			<div class="box-register">
				@if(session('message'))
					<div class="alert alert-success">
					 	<strong>{{ session('message') }}</strong>
					</div>
				@endif
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
				<h1 class="">Đặt câu hỏi</h1>
				<div class="form-group">
					<label for="">Tiêu đề</label>
					<input type="text" name="name" class="form-control">
					@if ($errors->first('name')!='')
		                <label class="control-label" for="inputError" style="color: red">
		                  <i class="fa fa-times-circle-o"></i> 
		                  {!! $errors->first('name'); !!}
		                </label>
		            @endif
				</div>
				<div class="form-group">
					<label for="">Chọn chủ đề</label>
					<select name="cate_id" class="form-control">
						<option value="">--Chọn chủ đề--</option>
						@foreach($categories as $category)
						<option value="{{ $category->id }}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Nội dung:</label>
					<textarea name="content" id="txtContent" class="form-control"></textarea>
					@if ($errors->first('contet')!='')
		                <label class="control-label" for="inputError" style="color: red">
		                  <i class="fa fa-times-circle-o"></i> 
		                  {!! $errors->first('content'); !!}
		                </label>
		            @endif
				</div>
				
				<div class="form-group btn-register-member">
					<input type="submit" name="" value="Gửi" class="btn btn-primary">
				</div>
			</div>
		</form>
	</div>

	
</div>
@endsection
