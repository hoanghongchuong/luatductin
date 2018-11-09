<?php
    $setting = Cache::get('setting');
    $services = DB::table('news')->where('com','dich-vu')->where('status',1)->get();
    $category_header = DB::table('news_categories')->select('name', 'id','alias','parent_id')->where('parent_id',0)->get();
?>
<header id="header" class="header">     
    <div class="info_header hidden-xs">
        <!-- <p class="name_company">Văn phòng luật sư đức tín</p> -->
        <div class="info_company">
            <p class="address_header"><i class="fa fa-map-marker"></i> &nbsp; {{$setting->address}}</p>
            <p class="phone-header"><i class="fa fa-phone"></i> &nbsp; {{$setting->phone}}</p>
        </div>
        <div class="register_block">
            <a href="{{ route('member.register') }}">Đăng ký</a>
            <a href="javascript:;" data-toggle="modal" data-target="#myModal">Đăng nhập</a>
        </div>
    </div>      
    <div class="top_header_mobile visible-xs visible-sm">
        <div class="left">
            <a href="" title=""><img src="{{asset('upload/hinhanh/'.$setting->photo)}}"></a>
        </div>
        <div class="right">
            <p class="name_company">Văn phòng luật sư đức tín</p>
            <div class="addi">                      
                <p class="address_header"><i class="fa fa-map-marker"></i> &nbsp; {{$setting->address}}</p>
                <p class="phone-header"><i class="fa fa-phone"></i> &nbsp; {{$setting->phone}}</p>
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
        <li><a href="{{url('lien-he')}}" title="">Liên hệ</a></li>
    </ul>            
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align: center;">Đăng nhập</h4>
            </div>
            <form action="" method="get" accept-charset="utf-8">
              
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group" style="text-align: center;">                   
                        <input type="submit" name="" value="Đăng nhập" class="btn btn-primary">
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>