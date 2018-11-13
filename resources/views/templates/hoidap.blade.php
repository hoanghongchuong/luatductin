@extends('index')
@section('content')
<div class="content_list_hoidap">
    <div class="col-md-8 left pdl-0 pdr-0">
        <div class="breadcrumb-box-hoidap">
            <ul>
                <li><a href="{{ url('') }}" title=""><img src="{{ asset('public/images/ico_title.png')}}">Trang chủ </a></li>
                <li><a href="{{url('hoi-dap')}}" title=""><img src="{{ asset('public/images/icon_titlemem.gif')}}">Hỏi đáp </a> </i></li>
                <!-- <li><a href="" title=""><img src="{{ asset('public/images/icon_titlemem.gif')}}">Dân sự</a></li> -->
            </ul>
        </div>
        <div class="content_box_hoidap">
            <div class="box-search-hoidap">
                <div class="_item">
                    <form action="" method="get" accept-charset="utf-8">
                        <input type="text" placeholder="Từ khóa tìm kiếm" class="input-search-hoidap" name="">
                        <input type="submit" class="btn-search-hoidap" id="" name="">
                    </form>
                </div>
            </div>
            <p class="slogan-hoidap">Đặt câu hỏi cho luật sư tư vấn bằng cách chọn một chuyên mục bên dưới
                @if(!Auth::guard('member')->check())
                <span style="color: red">(<a href="javascript:;" style="color: red" data-toggle="modal" data-target="#myModal">Đăng nhập để gửi câu hỏi cho luật sư</a>)</span>
                @endif
            </p>
            @if(Auth::guard('member')->check())
            <p><a href="{{url('dat-cau-hoi')}}" title="" class="btn btn-danger">Hỏi luật sư</a></p>
            @endif
            <h1 class="title-hoidap">Tư vấn của luật sư</h1>
            <div class="box-table">
                <table class="table table-hover table-bordered">
                    <!-- <caption>table title and/or explanatory text</caption> -->
                    <thead style="background-color: #bccbd8; ">
                        <tr>
                            <th style="text-align: left;">Chuyên mục</th>
                            <th style="text-align: center;">Số câu hỏi</th>
                            <th style="text-align: center;">Bài viết mới</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $cate)
                        <?php $post = DB::table('questions')->where('cate_id', $cate->id)->where('status',1)->orderBy('id','desc')->first();?>
                        <tr>
                            <td>
                                <a href="{{url('hoi-dap/'.$cate->alias)}}" title="{{$cate->name}}">{{$cate->name}}</a>
                            </td>
                            <td style="text-align: center;">{{$cate->questions->count()}}</td>
                            <td>
                                <a href="{{route('detail.question', @$post->alias)}}" title="">{{ @$post->name }}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <div class="col-md-4 flex-box right pdr-0 col-sm-12 col-xs-12">
        @include('templates.sidebar')
    </div>
</div>
@endsection