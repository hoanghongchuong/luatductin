<?php
    $setting = Cache::get('setting');
    $category_footers = DB::table('news_categories')->select('name', 'id','alias','parent_id')->where('parent_id',0)->get();
?>

<footer>
    <div class="layout">
        
        <div class="top_footer">
            @foreach($category_footers as $cate)
            <?php $cateChilds = DB::table('news_categories')->where('parent_id', $cate->id)->get(); ?>
            @if(count($cateChilds) > 0)
            <div class="col-md-3 col-xs-6 col-sm-3 box_item_footer">
                <p class="title-footer">{{$cate->name}}</p>
                <ul>
                    @foreach($cateChilds as $child)
                    <li><a href="{{ url('/',$child->alias) }}">{{$child->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endif
            @endforeach
        </div>
        <div class="bottom_footer">
            <!-- <div class="title_company_name">Văn phòng luật Đức Tín</div>
            <p>Địa chỉ: Số 31 ngõ 73, phố Nguyễn Lương Bằng, phường Nam Đồng, quận Đống Đa, Hà Nội</p>
            <p>Điện thoại: <span class="phone">098 882 33 38</span> &nbsp;- Email: <a href="" title="">luatsuduclong@gmail.com</a></p>
            <p>Chịu trách nhiệm về nội dung: Luật sư Nguyễn Đức Long - Giám đốc điều hành</p>
            <p><a href="" title="">Chính sách & và quy định chung</a> | <a href="" title="">Chính sách bảo mật thông tin</a></p>
            <h3>Luật sư tư vấn pháp luật trực tuyến qua điện thoại - 098 882 33 38</h3> -->
            {!! $setting->fax !!}
        </div>
    </div>
</footer>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=124844007858325";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>