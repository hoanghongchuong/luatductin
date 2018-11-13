@extends('index')
@section('content')

<div class="content_cate">
    <div class="col-md-8 left pdl-0 pdr-0">
        <div class="breadcrumb-box">
            <ul>
                <li><a href="{{ url('') }}" title="">Trang chủ /</a></li>
                <li><a href="{{ url('/', $news_cate->alias) }}" title="">{{ $news_cate->name }} /</a></li>
                <li><a href="" title="">{{ $news_detail->name }}</a></li>
            </ul>
        </div>

        <div class="content_detail">
            <div class="box-header-content">
                <h1 class="name_news_detail">{{ $news_detail->name }}</h1>
                <p class="post-date">Cập nhật: {{date('d/m/Y', strtotime($news_detail->created_at))}}
                </p>
               
            </div>
            <!-- <div class="post_same_cate">
                <p class="title">Bài viết cùng chủ đề</p>
                <ul>
                    <li><a href="">Phân biệt vụ án dân sự và vụ việc dân sự</a></li>
                    <li><a href="">Tổng đài luật sư tư vấn pháp luật Dân sự trực tuyến</a></li>
                    <li><a href="">Tư vấn pháp luật dân sự</a></li>
                </ul>
            </div> -->
            <div class="contetn_post_detail">
                {!! $news_detail->content !!}
            </div>
            <div class="comment-facebook">
                <div class="fb-comments" data-href="{{ URL::Current() }}" data-width="100%" data-numposts="2"></div>
            </div>
            <div class="post_same_cate">
                <p class="title">Bài viết liên quan</p>
                <ul>
                    @foreach($news_same_cate as $item)
                    <li><a href="">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4 flex-box right pdr-0 col-sm-12 col-xs-12">
        @include('templates.sidebar')
    </div>
</div>
@endsection
