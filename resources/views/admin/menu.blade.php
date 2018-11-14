<?php $is_admin = Auth::guard('admin')->user(); ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <ul class="sidebar-menu">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        
        @if($is_admin->can('admin_manager'))
        <li class="{{ Request::segment(2) == 'admin' ? 'active' : '' }}">
            <a href="{{ route('admin.admin.index') }}"><i class="fa fa-user"></i>Quản lý tài khoản</a>
        </li>
        @endif
        @if($is_admin->can('can_news_category') || $is_admin->can('can_news'))
        <li class="treeview {{ Request::segment(2) == 'news' ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Quản lý bài viết</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu ">
            @if($is_admin->can('can_news_category'))           
                <li class="{{ Request::segment(2) == 'newscate' ? 'active' : '' }}"><a href="backend/newscate?type=bai-viet"><i class="fa fa-circle-o"></i> <span>Danh mục</span></a></li>
            @endif
            @if($is_admin->can('can_news'))
                <li class="{{ Request::segment(2) == 'news' ? 'active' : '' }}"><a href="backend/news?type=bai-viet"><i class="fa fa-circle-o"></i> <span>Danh sách</span></a></li> 
            @endif
            </ul>
        </li>
        @endif
        @if($is_admin->can('can_question'))
        <li class="treeview {{ Request::segment(2) == 'productcate' || Request::segment(2) =='question' ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Quản lý câu hỏi</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">            
                <li class="{{ Request::segment(2) == 'productcate' ? 'active' : '' }}"><a href="backend/productcate"><i class="fa fa-circle-o"></i> <span>Danh mục</span></a></li>
                <li class="{{ Request::segment(2) == 'question' ? 'active' : '' }}"><a href="{{ route('question.index') }}"><i class="fa fa-circle-o"></i> <span>Danh sách</span></a></li>  
            </ul>
        </li>
        @endif
        @if($is_admin->can('can_contact'))
        <li><a href="backend/about/edit?type=lien-he"><i class="fa fa-envelope"></i> <span>Quản lý liên hệ</span></a></li>
        @endif
        <!-- <li><a href="backend/news?type=tin-tuc"><i class="fa fa-circle-o"></i> <span>Quản lý tin tức</span></a></li> -->
        <!-- <li><a href="backend/news?type=du-an"><i class="fa fa-circle-o"></i> <span>Quản lý dự án</span></a></li>     -->
              
        <!-- <li><a href="backend/about/edit?type=gioi-thieu"><i class="fa fa-circle-o"></i> <span>Giới thiệu</span></a></li>   -->
        
        <!-- <li><a href="backend/partner"><i class="fa fa-circle-o"></i> <span>Quản lý đối tác</span></a></li> -->
        <!-- <li><a href="backend/feedback"><i class="fa fa-gear" aria-hidden="true"></i> <span>Ý kiến khách hàng</span></a></li> -->
        <!-- <li><a href="backend/lienket?type=taisao"><i class="fa fa-gear" aria-hidden="true"></i> <span>Tại sao chọn chúng tôi</span></a></li> -->
        <!-- <li><a href="backend/video"><i class="fa fa-circle-o"></i> <span>Video</span></a></li> -->       
        
        
        
        <!-- <li><a href="backend/newsletter?type=newsletter"><i class="fa fa-circle-o"></i> <span>Đăng ký nhận tin</span></a></li> -->
       
        
        
        <!-- <li><a href="backend/chinhanh"><i class="fa fa-envelope"></i><span>Quản lý chi nhánh</span></a></li> -->
        <!-- <li><a href="backend/slogan"><i class="fa fa-gear" aria-hidden="true"></i> <span>Quản lý slogan</span></a></li> -->
       
        
        <!-- <li><a href="backend/slider?type=gioi-thieu"><i class="fa fa-circle-o"></i> <span>Quản lý slider</span></a></li> -->
        @if($is_admin->can('can_setting'))
        <li><a href="{{ asset('backend/setting') }}"><i class="fa fa-gear" aria-hidden="true"></i> <span>Quản lý thiết lập</span></a></li>       
        @endif
        <!-- <li><a href="backend/position"><i class="fa fa-gear" aria-hidden="true"></i> <span>Vị trí quảng cáo</span></a></li> -->
        
        
      </ul>
    </section>
</aside>