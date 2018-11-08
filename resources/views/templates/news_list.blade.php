@extends('index')
@section('content')
<?php
    $setting = Cache::get('setting');
?>
<div class="content_cate">
    <div class="col-md-8 left pdl-0 pdr-0">
        <div class="breadcrumb-box">
            <ul>
                <li><a href="{{ url('') }}" title="">Trang chủ /</a></li>
                <li><a href="{{ url('/',$tintuc_cate->alias) }}" title="">{{$tintuc_cate->name}} </a> </i></li>
                <!-- <li><a href="" title="">Luật dân sự</a></li> -->
            </ul>
        </div>

        <div class="content_detail">
            <div class="box-header-content">
                <!-- <h1 class="name_news_detail">Tư vấn Pháp luật Dân sự - Dịch vụ luật sư Dân sự</h1>
                <div class="des">Luật Minh Gia tư vấn pháp luật và cung cấp các dịch vụ pháp lý trong lĩnh vực Dân sự như tư vấn pháp luật hợp đồng, pháp luật thừa kế, di chúc, giải quyết tranh chấp dân sự và các quan hệ dân sự có yếu tố nước ngoài.</div> -->
                {!! $tintuc_cate->mota !!}
            </div>
            <div class="list-item-news">
                @foreach($news as $item)
                <div class="item">
                    <div class="box-image-news">
                        <a href="" title="">
                            <img src="{{asset('upload/news/'.$item->photo)}}">
                        </a>
                    </div>
                    <div class="box-right">
                        <h3>
                            <a class="title" href="{{ url('/',$item->alias.'.html') }}" title="{{$item->name}}">{{$item->name}}</a>
                        </h3>
                        <div class="short-content-news">
                            {!! $item->mota !!}
                            <p class="read-more"><a href="{{ url('/',$item->alias.'.html') }}" title="">Chi tiết >></a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4 flex-box right pdr-0 col-sm-12 col-xs-12">
        @include('templates.sidebar')
    </div>
</div>
<div class="boxbt">
    <div class="box_item_boxbt">
        <div class="bg"><img src="{{ asset('public/images/bg.png')}}"></div>
            <div class="owl-carousel-detail">
                @foreach($hot_news as $k=>$hot)
                <div class="item">
                    <a data-slide-index="{{$k}}" href="{{ route('getNewsDetail', $hot->alias.'.html') }}">
                            <img src="{{asset('upload/news/'.$hot->photo)}}" title="{{$hot->name}}" alt="{{$hot->name}}" />
                        <p class=""><a href="{{ route('getNewsDetail', $hot->alias.'.html') }}">{{$hot->name}}</a></p>
                    </a>
                </div>
                @endforeach
            </div>
    </div>

</div>
@endsection