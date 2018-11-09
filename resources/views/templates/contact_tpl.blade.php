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
                <li><a href="" title="">Liên hệ </a> </i></li>
                <!-- <li><a href="" title="">Luật dân sự</a></li> -->
            </ul>
        </div>

        <div class="content_detail">
            <div class="box-header-content">
                {!! $data->content !!}
               	<div class="map">{!! $setting->iframemap !!}</div>
            </div>
           
        </div>
    </div>
    <div class="col-md-4 flex-box right pdr-0 col-sm-12 col-xs-12">
        @include('templates.sidebar')
    </div>
</div>

@endsection
