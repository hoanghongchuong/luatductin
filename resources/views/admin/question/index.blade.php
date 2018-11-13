@extends('admin.master')
@section('content')
@section('controller','Câu hỏi')
@section('action','List')
<section class="content-header">
  <h1>
    @yield('controller')
    <small>@yield('action')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="backend"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="javascript:">List</a></li>
    <li class="active">Câu hỏi</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @include('admin.messages_error')
        <!--<div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>-->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <!-- <th style="width: 20px;"><input type="checkbox" name="chonhet" class="minimal" id="chonhet" /></th> -->
                <th class="text-center with_dieuhuong">Stt</th>
                <th>Người hỏi</th>
                <th>Tiêu đề</th>
                <!-- <th>Nội dung</th> -->
                <th>Đã duyệt</th>
                <th class="text-center with_dieuhuong">Sửa</th>
                <th class="text-center with_dieuhuong">Xóa</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $key => $item)
            <tr>
                
                <td>{{ $key+1 }}</td>
                <!-- <td><img src="{{asset('upload/hinhanh/'.$item->photo)}}" class="img_product" alt=""></td> -->
                <td>{{$item->member->name}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <button type="button" class="btn btn-{{ !$item->status ? 'warning' : 'success' }} btn-status-question" question-id="{{ $item->id }}">
                      @if(!$item->status)
                        Chưa duyệt
                        @else
                        Đã duyệt
                      @endif
                    </button>
                    <!-- @if($item->status > 0)
                      <a href="javascript:;" class="btn btn-primary btn-sm">Đã duyệt</a>
                    @else
                      <a href="javascript:;" class="btn btn-danger btn-xs">Chưa duyệt</a>
                    @endif -->
                </td>      
                <td class="text-center with_dieuhuong">
                  <i class="fa fa-pencil fa-fw"></i><a href="{{asset('backend/question/edit/'.$item->id)}}">Chi tiết</a>
                </td>
                <td class="text-center">
                  <i class="fa fa-trash-o fa-fw"></i><a onClick="if(!confirm('Xác nhận xóa')) return false;" href="{{ route('question.delete', $item->id) }}">Delete</a>
                </td>
            </tr>
            @endforeach
            </tbody>
          </table>
        </div><!-- /.box-body -->
        <div class="box-footer col-md-12">
          <div class="row">
            <div class="col-md-6">
              <!-- <input type="button" onclick="javascript:window.location='backend/question/create'" value="Thêm" class="btn btn-primary" /> -->
              <!-- <button type="button" id="xoahet" class="btn btn-success">Xóa</button> -->
              <input type="button" value="Thoát" onclick="javascript:window.location='backend'" class="btn btn-danger" />

            </div>
          </div>
        </div>
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->

<script>
    $('.btn-status-question').on('click', function(){
        var btn = $(this);
        var question_id = btn.attr('question-id');
        
        $.ajax({
            url: '{{route("question.access")}}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                question_id: question_id
            },
            success: function(res){
                if(res == 1){
                    btn.addClass('btn-success').removeClass('btn-warning');
                    btn.text('Đã duyệt');
                }
                if (res == 0) {
                    btn.addClass('btn-warning').removeClass('btn-success');
                    btn.text('Chưa duyệt');
                }
            }
        });
    });
</script>
@endsection