<?php
    $setting = Cache::get('setting');
    $services = DB::table('news')->where('com','dich-vu')->where('status',1)->get();
    $category_header = DB::table('news_categories')->select('name', 'id','alias','parent_id')->where('parent_id',0)->get();
?>
<header id="header" class="header">     
    <div class="info_header hidden-xs">
        <!-- <p class="name_company">Văn phòng luật sư đức tín</p> -->
        <div class="info_company">
            <p class="address_header"><i class="fa fa-map-marker"></i> &nbsp; Số 31 ngõ 73, phố Nguyễn Lương Bằng, phường Nam Đồng, quận Đống Đa, Hà Nội</p>
            <p class="phone-header"><i class="fa fa-phone"></i> &nbsp; 098 882 33 38</p>
        </div>
        <div class="register_block">
            <a href="">Đăng ký</a>
            <a href="">Đăng nhập</a>
        </div>
    </div>      
    <div class="top_header_mobile visible-xs visible-sm">
        <div class="left">
            <a href="" title=""><img src="images/logo.png"></a>
        </div>
        <div class="right">
            <p class="name_company">Văn phòng luật sư đức tín</p>
            <div class="addi">                      
                <p class="address_header"><i class="fa fa-map-marker"></i> &nbsp; Số 31 ngõ 73, phố Nguyễn Lương Bằng, phường Nam Đồng, quận Đống Đa, Hà Nội</p>
                <p class="phone-header"><i class="fa fa-phone"></i> &nbsp; 098 882 33 38</p>
            </div>
        </div>
    </div>
</header><!-- /header -->
<div class="menu">         
    <ul class="navi">
        <li class="active"><a href="{{url('')}}">Trang chủ</a></li>
        @foreach($category_header as $category)
        <li>
            <a href="{{route('getListNews', $category->alias)}}">{{$category->name}}</a>
            <?php $categoryChilds = DB::table('news_categories')->where('parent_id', $category->id)->get(); ?>
            @if(count($categoryChilds) > 0)
            <ul class="vk-menu__child">
                @foreach($categoryChilds as $cate_child)
                <li><a href="{{route('getListNews', $cate_child->alias)}}">{{$cate_child->name}}</a></li>
                @endforeach
                
            </ul>
            @endif
        </li>
        @endforeach
        <li><a href="#" title="">Liên hệ</a></li>
    </ul>            
</div>
