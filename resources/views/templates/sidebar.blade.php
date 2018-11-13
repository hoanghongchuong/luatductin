<?php 
    $hot_news = DB::table('news')->where('noibat',1)->where('status',1)->take(20)->orderBy('id','desc')->get();
    $category_hoidap = DB::table('product_categories')->get();
?>
<div class="box-search">
    <p class="title-search">Tìm kiếm</p>
    <div class="search-text" id="search_text">
        <form action="{{ route('search') }}" method="get" accept-charset="utf-8">
            <div class="form-group">
                <input type="text" placeholder="Từ khóa tìm kiếm" required="" class="input-search text" name="txtSearch">
                <input type="submit" class="btn-search" id="search_btn" name="">
            </div>
        </form>
    </div>
    <!-- <p class="example_vd"><strong style="font-size: 12px;">VD:</strong> <a href="" title="">Tư vấn pháp luật,</a> <a href="" title="">Luật tranh tụng,</a></p> -->
    
</div>
<div id="supports" class="hidden-sm">  
    <img src="{{asset('public/images/hoidap.png')}}" alt="">
    <div class="list-cate">
        <ul>
            @foreach($category_hoidap as $c)
            <li><a href="{{ url('hoi-dap', $c->alias) }}">{{ $c->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<div class="box-hot pdt-20">
    <h2 class="title_box_news">Dịch vụ nổi bật</h2>
    <ul class="news_hot">
        @foreach($hot_news as $hot)
        <li><a href="{{url('/',$hot->alias.'.html')}}">{{$hot->name}}</a></li>
        @endforeach
        
    </ul>
</div>