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
	                <label for="" style="font-size: 22px;">Câu hỏi</label>
	                <textarea name="content" id="" cols="30" rows="5" class="form-control">{!! $data->name !!}</textarea>
	            </div>
	            <div class="form-group">
	            	<label for=""><strong style="font-size: 22px;">Câu Trả lời</strong></label>
	            	@foreach($answers as $item)
	            	<div class="content_answer">
	            		<div class="box-answer">
							@if($item->member_id)
	            			<span><strong>Trả lời:</strong> </span>{!! $item->content !!}
	            			<p>	            				
                                <button type="button" class="btn btn-{{ !$item->status ? 'warning' : 'success' }} status_answer" answer-id="{{ $item->id }}">
			                      @if(!$item->status)
			                        Chưa duyệt
			                        @else
			                        Đã duyệt
			                      @endif
			                    </button>
	            			</p>
							@endif
							@if($item->admin_id)
	            			<span><strong>Trả lời:</strong> </span>{!! $item->content !!}
							@endif
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
<script>
	$('.status_answer').on('click', function(){
		var btn = $(this);
        var anwser_id = btn.attr('answer-id');
        $.ajax({
            url: '{{ route("admin.answer.active") }}',
            type: 'POST',
            data: {
            	_token: '{{ csrf_token() }}',
            	anwser_id : anwser_id            	
            },
            success: function(res){
                if(res == 1){
                	btn.addClass('btn-success').removeClass('btn-warning');
                	btn.text('Đã xử lý');
                }
                if (res == 0) {
                    btn.addClass('btn-warning').removeClass('btn-success');
                    btn.text('Chưa xử lý');
                }
            }
        });
    });
</script>
@endsection