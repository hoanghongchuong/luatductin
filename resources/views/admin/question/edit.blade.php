@extends('admin.master')
@section('content')
@section('controller','Câu hỏi')
@section('action','Chi tiết')
<section class="content-header">
  <h1>
    @yield('controller')
    <small>@yield('action')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="admin"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="javascript:">@yield('controller')</a></li>
    <li class="active">@yield('action')</li>
  </ol>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">

			<div class="col-md-12">
				<div class="form-group">
	                <label for="">Câu hỏi</label>
	                <textarea name="content" id="" cols="30" rows="10" class="form-control">{!! $data->name !!}</textarea>
	            </div>
	            <div class="form-group">
	            	<label for="">Trả lời</label>
	            	@foreach($answers as $item)
	            	<div class="content_answer">
	            		<div class="box-answer">
	            			<span><strong>Trả lời:</strong> </span>{!! $item->content !!}
	            		</div>
	            		<div class="box-footer-answer">
	            			<span>Người trả lời: 
								@if($item->admin_id)
	            				<strong>{{ @$item->admin->name }}</strong>
								@endif
								@if($item->member_id)
								<strong>{{ $item->member->name }}</strong>
								@endif
	            			</span>
	            		</div>
	            	</div>
	            	@endforeach
	            </div>
	            <form action="{{ route('question.postEdit', $data->id) }}" method="post" accept-charset="utf-8">
	            	{{ csrf_field() }}
	            	<div class="form-group">
		                <label for="">Nội dung trả lời</label>
		                <textarea name="content" id="txtContent" cols="30" rows="10"></textarea>
		            </div>
		            <div class="clearfix"></div>
				    <div class="box-footer">
				    	<div class="row">
							<div class="col-md-6">
						    	<button type="submit" class="btn btn-primary">Trả lời</button>
					    	</div>
				    	</div>
				  	</div>
	            </form>
            	
            </div>
		</div>
	</div>
</section>
@endsection