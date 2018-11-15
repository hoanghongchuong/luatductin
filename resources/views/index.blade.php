<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php 
        $setting = Cache::get('setting'); 
        $product_list = Cache::get('product_list');
    ?>
    <meta http-equiv="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name='revisit-after' content='1 days' /> 
    <title><?php if(!empty($title)) echo $title; else echo $setting->title; ?></title>
    <meta name="author" content="{!! $setting->website !!}" />
    <meta name="copyright" content="GCO" />
    <meta name="keywords" content="<?php if(!empty($keyword)) echo $keyword; else echo $setting->keyword; ?>" />
    <meta name="description" content="<?php if(!empty($description)) echo $description; else echo $setting->description; ?>" />
    <meta http-equiv="content-language" content="vi" />
    <meta property="og:title" content="<?php if(!empty($title)) echo $title; else echo $setting->title; ?>" />
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:url" content="{!! $setting->website !!}" />
    <meta property="og:site_name" content="<?php if(!empty($title)) echo $title; else echo $setting->title; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="<?php if(!empty($img_share)) echo $img_share; else echo asset('upload/hinhanh/'.$setting->photo) ?>" />
    <meta property="og:description" content="<?php if(!empty($description)) echo $description; else echo $setting->description; ?>" />
    <meta name="googlebot" content="all, index, follow" />
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="10.764338, 106.69208" />
    <meta name="geo.placename" content="Hà Nội" />
    <meta name="Area" content="HoChiMinh, Saigon, Hanoi, Danang, Vietnam" />
    <link rel="shortcut icon" href="{!! asset('upload/hinhanh/'.$setting->favico) !!}" type="image/png" />

    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/responsive.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery.bxslider.css')}}" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="{{ asset('public/js/jquery-2.1.4.min.js')}}"></script>
        <script type="text/javascript">
            function baseUrl(){
                return '<?php echo url('/'); ?>';
            }
           
       </script>
</head>
<body>
    <div class="layout">   
    @include('templates.layout.header')
    @yield('content')
    <?php $category_footers = DB::table('news_categories')->select('name', 'id','alias','parent_id')->where('parent_id',0)->get(); ?>
    <div class="menu_footer">
        <ul class="">
            <li class=""><a href="index.html">Trang chủ</a></li>
            @foreach($category_footers as $cate)
            <li>
                <a href="{{ url('/',$cate->alias) }}">{{ $cate->name }}</a>                    
            </li>
            @endforeach
        </ul>
    </div>
    </div>
    @include('templates.layout.footer')
   <!--  <a href="#" id="back-to-top" title="Back to top" class="show">
        <i class="fa fa-chevron-up"></i>
    </a> -->
    
    <!--Menu on mobile-->

    
    {!! $setting->codechat !!}
    {{ $setting->analytics }}
    @yield('script')
    <script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('public/js/jquery.bxslider.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{!! asset('public/admin_assets/plugins/tinymce/tinymce.min.js') !!}"></script>
    
    <script src="{{ asset('public/js/script.js')}}"></script>

   
        @if(Session::has('toastr_msg'))
            <script type='text/javascript'>
                toastr["{!! Session::get('toastr_lvl') !!}"]("{!! Session::get('toastr_msg') !!}")
            </script>
        @endif
  
</body>
</html>