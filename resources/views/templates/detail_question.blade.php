@extends('index')
@section('content')

<div class="content_cate">
    <div class="col-md-8 left pdl-0 pdr-0">
        <div class="breadcrumb-box">
            <ul>
                <li><a href="{{ url('') }}" title="">Trang chủ /</a></li>
                <li><a href="{{ url('hoi-dap')}}" title="">Hỏi đáp</a></li>
            </ul>
        </div>
        <div class="content_detail">
            <div class="box-header-content">
                <h1 class="name_news_detail">{{$data->name}}</h1>
                <p class="post-date">Cập nhật: {{date('d/m/Y', strtotime($data->created_at))}}
                	&nbsp; Người hỏi: <strong>{{$data->member->name}}</strong>
                </p>               
            </div>            
            <div class="contetn_post_detail">
                {!! $data->content !!}
            </div>
        </div>
        <div class="discuss">
        	<p class="title">
        		Thảo luận
				<span style="float:right; padding-right: 12px; margin-right: 10px;" data-toggle="modal" data-target="#myModalTraLoi" class="btn btn-primary">Trả lời</span>
        	</p>
        	@foreach($answers as $item)
            <?php $member_photo = DB::table('members')->select('photo','id')->where('id',$item->member_id)->first(); ?>
        	<div class="traloi">
        		<div class="col-md-3 leftx">
        			
        			@if($item->member_id)
                    <p style="text-align: center;">
                        @if($member_photo->photo == '')
                        <img src="{{ asset('public/images/avatar.png') }}" width="60px;">
                        @else
                        <img src="{{ asset($member_photo->photo) }}" width="60px;">
                        @endif
                    </p>
        			<p style="font-size: 13px; text-align: center;"><strong >{{ $item->member->name }}</strong></p>
        			@endif
        			@if($item->admin_id !='')
                               	
                        <p style="text-align: center;"><img src="{{ asset(@$item->admin->avatar) }}" onerror="this.src='{{asset('public/images/avatar.png')}}'" width="60px"></p>		
            			<p style="font-size: 13px; text-align: center;"><strong >{{ $item->admin->name }}</strong></p>
            			<p style="color: #DB1E9C; font-size: 13px; font-weight: bold;text-align: center;">Luật sư</p>
                        
        			@endif
        		</div>
				<div class="content col-md-9">{!! $item->content !!}</div>
        	</div>
        	@endforeach
        </div>
    </div>
    <div class="col-md-4 flex-box right pdr-0 col-sm-12 col-xs-12">
        @include('templates.sidebar')
    </div>
</div>


<div id="myModalTraLoi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Câu trả lời</h4>
      </div>
      <div class="modal-body-traloi">
        <form action="{{ route('postAnswer') }}" method="post" accept-charset="utf-8">
            {{ csrf_field() }}
            <input type="hidden" name="question_id" value="{{ $data->id }}">
            <p style="font-size: 15px; font-weight: bold; margin-top: 10px;">Nội dung:</p>

            <textarea name="content" required="required" id="txtContent" class="form-control" size="10">
                
            </textarea>

            <p style="text-align: right; margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Gửi</button>
            </p>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> -->
    </div>

  </div>
</div>
@endsection
