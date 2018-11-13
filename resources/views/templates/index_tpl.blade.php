@extends('index')
@section('content')

<?php
$setting = Cache::get('setting');
$slider = DB::table('slider')->select()->where('status',1)->where('com','gioi-thieu')->orderBy('created_at','desc')->get();
?>
<div class="content-box1">
	<div class="col-md-6 left flex-box col-sm-12 col-xs-12">
		<div class="box-left">
			<div class="box-news">
				<a href="{{ route('getNewsDetail', @$tintuc_moinhat[0]->alias) }}" title="">
					<img src="{{asset('upload/news/'.@$tintuc_moinhat[0]->photo)}}" class="imgn">
				</a>
				<p class="name_news"><a href="{{ route('getNewsDetail', @$tintuc_moinhat[0]->alias) }}" title="">{!! @$tintuc_moinhat[0]->name !!}</a></p>
				<div class="short_des">{!! @$tintuc_moinhat[0]->mota !!}</div>
			</div>
			<div class="list-box-news">
				<div class="col-md-4 col col-sm-4 col-xs-6">
					<img src="{{asset('upload/news/'.@$tintuc_moinhat[1]->photo)}}">
					<p class="name_news"><a href="{{ route('getNewsDetail', @$tintuc_moinhat[1]->alias.'.html') }}" title="">{{@$tintuc_moinhat[1]->name}}</a></p>
				</div>
				<div class="col-md-4 col col-sm-4 col-xs-6">
					<img src="{{asset('upload/news/'.@$tintuc_moinhat[2]->photo)}}">
					<p class="name_news"><a href="{{ route('getNewsDetail', @$tintuc_moinhat[2]->alias.'.html') }}" title="">{{ @$tintuc_moinhat[2]->name }}</a></p>
				</div>
				<div class="col-md-4 col col-sm-4 col-xs-6">
					<img src="{{asset('upload/news/'.@$tintuc_moinhat[3]->photo)}}">
					<p class="name_news"><a href="{{ route('getNewsDetail', @$tintuc_moinhat[3]->alias.'.html') }}" title="">{{@$tintuc_moinhat[3]->name}}</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3 center flex-box col-sm-12 col-xs-12">
		<div class="box-hot">
			<h2 class="title_box_news">Dịch vụ nổi bật</h2>
    		<ul class="news_hot">
    			@foreach($hot_news as $item_hot)
    			<li><a href="{{ route('getNewsDetail', $item_hot->alias.'.html') }}">{{$item_hot->name}}</a></li>
    			@endforeach
    		</ul>
		</div>
		
	</div>
	<div class="col-md-4 flex-box right col-sm-12 col-xs-12">
		<div class="box-search">
			<p class="title-search">Tìm kiếm</p>
			<div class="search-text" id="search_text">
				<form action="{{ route('search') }}" method="get" accept-charset="utf-8">
					<div class="form-group">
						<input type="text" placeholder="Từ khóa tìm kiếm" class="input-search text" name="txtSearch">
						<input type="submit" class="btn-search" id="search_btn" name="">
					</div>
				</form>
			</div>
			<p class="example_vd"><strong style="font-size: 12px;">VD:</strong> <a href="" title="">Tư vấn pháp luật,</a> <a href="" title="">Luật tranh tụng,</a></p>
			
		</div>
		<div id="supports" class="hidden-sm">  
            <img src="{{asset('public/images/hoidap.png')}}" alt="">
            <div class="list-cate">
                <ul>
                    <li><a href="">Dân sự</a></li>
                    <li><a href="">Hình sự</a></li>
                    <li><a href="">Hôn nhân</a></li>
                    <li><a href="">Doanh nghiệp</a></li>
                    <li><a href="">Đất đai</a></li>
                    <li><a href="">Lao động</a></li>
                </ul>
            </div>
        </div>
	</div>
</div>
@foreach($categories as $category)
<?php 
	$ids =[];
	$ids[] = $category->id;
	$cateChilds = DB::table('news_categories')->where('parent_id', $category->id)->get();
	foreach($cateChilds as $child){
		$ids[] = $child->id;
	}
	$news_top = DB::table('news')->where('status',1)->whereIn('cate_id', $ids)
		->where('noibat',1)
		->where('status',1)
		->take(4)
		->orderBy('id', 'desc')->get();
	$news_bottom = DB::table('news')->where('status',1)->whereIn('cate_id', $ids)
		->where('status',1)
		->take(3)
		->inRandomOrder()->get();
	$news_right = DB::table('news')->where('status',1)->whereIn('cate_id', $ids)
	->where('status',1)
	->take(10)
	->orderBy('id','desc')->get();
?>
<div class="content-box2">
	<div class="col-md-9 col-xs-12 col-sm-12 left">
		<div class="news">
			<div class="bgcat">
				<h2><a href="" title="{{$category->name}}">{{$category->name}}</a></h2>				
			</div> 
			<ul class="mnnews">				
				@foreach($category->cateChilds as $cate)
				<li>
					<a class="tab-click" rel="{{$cate->name}}" href="{{route('getListNews', $cate->alias)}}">{{$cate->name}}</a>
				</li>
				@endforeach
			</ul>       			
		</div>
		<div class="bnews">
			@if(count($news_top) > 0)
			<div class="bnews_top">
				<p class="name_news">
					<a href="{{ route('getNewsDetail', @$news_top[0]->alias) }}" title="">{{@$news_top[0]->name}}</a>
				</p>
				<div class="col-md-4 col-sm-6 left">
					<a href="{{ route('getNewsDetail', @$news_top[0]->alias) }}" title="">
						<img src="{{asset('upload/news/'.@$news_top[0]->photo)}}"></a>
				</div>
				<div class="col-md-8 col-sm-6">
					<div class="short_des">{!! @$news_top[0]->mota !!}</div>
					<div class="lnews">
						<ul>
							<li class="col-md-6"><a href="{{ route('getNewsDetail', @$news_top[1]->alias) }}" title="">{{@$news_top[1]->name}} </a></li>
							<li class="col-md-6"><a href="{{ route('getNewsDetail', @$news_top[2]->alias) }}" title="">{{@$news_top[2]->name}} </a></li>
							<li class="col-md-6"><a href="{{ route('getNewsDetail', @$news_top[3]->alias) }}" title="">{{@$news_top[3]->name}} </a></li>
							<li class="col-md-6"><a href="{{ route('getNewsDetail', @$news_top[4]->alias) }}" title="">{{@$news_top[4]->name}} </a></li>
						</ul>
					</div>

				</div>
			</div>
			@endif

			<div class="list-item-box">
				<ul>
					@foreach($news_bottom as $new_bot)
					<li>
						<div class="box-img">
							<a href="{{ route('getNewsDetail', $new_bot->alias) }}" title="{{$new_bot->name}}">
								<img src="{{asset('upload/news/'.$new_bot->photo)}}">
							</a>
						</div>
						<div class="news_name"><a href="{{ route('getNewsDetail', $new_bot->alias)}}" title="{{$new_bot->name}}">{{$new_bot->name}}</a></div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4 col-xs-12 col-sm-12 right hidden-xs hidden-sm">
		<div class="box-hot">
			<h2 class="title_box_news">Dịch vụ {{$category->name}}</h2>
    		<ul class="news_hot">
    			@foreach($news_right as $item_right)
    			<li><a href="{{ route('getNewsDetail', $item_right->alias) }}">{{$item_right->name}}</a></li>
    			@endforeach
    			
    		</ul>
		</div>
	</div>
</div>
@endforeach
<div class="boxbt">
    <div class="box_item_boxbt">
        <div class="bg"><img src="{{ asset('public/images/bg.png')}}"></div>
            <div class="owl-carousel-detail">
                @foreach($hot_news as $k=>$hot)
                <div class="item">
                    <a data-slide-index="{{$k}}" href="{{ route('getNewsDetail', $hot->alias) }}">
                            <img src="{{asset('upload/news/'.$hot->photo)}}" />
                        <p class=""><a href="{{ route('getNewsDetail', $hot->alias) }}">{{$hot->name}}</a></p>
                    </a>
                </div>
                @endforeach
            </div>
    </div>

</div>
@endsection
