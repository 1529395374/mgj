<?php 
use App\Models\Cate; ?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/Admin/plugins/colorpicker/colorpicker.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/Admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/Admin/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/Admin/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/Admin/css/themer.css" media="screen">
<!-- 分页css -->
<link rel="stylesheet" type="text/css" href="/Admin/css/page.css" media="screen">
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css" media="screen">
<script src="/layui/layui.all.js" type="text/javascript"></script>
<script src="/layui/jquery-3.2.1.min.js" type="text/javascript"></script>


<title>MWS Admin - Charts</title>

</head>

<body>

	<!-- Themer (Remove if not needed) -->  
	<div id="mws-themer">
        <div id="mws-themer-content">
        	<div id="mws-themer-ribbon"></div>
            <div id="mws-themer-toggle">
                <i class="icon-bended-arrow-left"></i> 
                <i class="icon-bended-arrow-right"></i>
            </div>
        	<div id="mws-theme-presets-container" class="mws-themer-section">
	        	<label for="mws-theme-presets">Color Presets</label>
            </div>
            <div class="mws-themer-separator"></div>
        	<div id="mws-theme-pattern-container" class="mws-themer-section">
	        	<label for="mws-theme-patterns">Background</label>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
                <ul>
                    <li class="clearfix"><span>Base Color</span> <div id="mws-base-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Highlight Color</span> <div id="mws-highlight-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Color</span> <div id="mws-text-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Color</span> <div id="mws-textglow-cp" class="mws-cp-trigger"></div></li>
                    <li class="clearfix"><span>Text Glow Opacity</span> <div id="mws-textglow-op"></div></li>
                </ul>
            </div>
            <div class="mws-themer-separator"></div>
            <div class="mws-themer-section">
	            <button class="btn btn-danger small" id="mws-themer-getcss">Get CSS</button>
            </div>
        </div>
        <div id="mws-themer-css-dialog">
        	<form class="mws-form">
            	<div class="mws-form-row">
		        	<div class="mws-form-item">
                    	<textarea cols="auto" rows="auto" readonly="readonly"></textarea>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Themer End -->

	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="/Admin/images/mws-logo.png" alt="mws admin">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	<a href="/Admin/#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-exclamation-sign"></i></a>
                
                <!-- Unread notification count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Notifications dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-notifications">
                        	<li class="read">
                            	<a href="/Admin/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="/Admin/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="/Admin/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="/Admin/#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="/Admin/#">View All Notifications</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="/Admin/#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="/Admin/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="read">
                            	<a href="/Admin/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="/Admin/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        	<li class="unread">
                            	<a href="/Admin/#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="/Admin/#">View All Messages</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="/Admin/example/profile.jpg" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <div id="mws-username">
                        Hello, John Doe
                    </div>
                    <ul>
                    	<li><a href="/Admin/#">Profile</a></li>
                        <li><a href="/Admin/#">Change Password</a></li>
                        <li><a href="/Admin/index.html">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	<div id="mws-searchbox" class="mws-inset">
            	<form action="typography.html">
                	<input type="text" class="mws-search-input" placeholder="Search...">
                    <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
                </form>
            </div>
            <style type="text/css">
                #mws-navigation ul li ul{
                    display:none;
                }
            </style>
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 用户管理</a>
                        <ul>
                            <li><a href="/admin/user">用户列表</a></li>
                            <li><a href="/admin/user/create">用户添加</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 分类管理</a>
                        <ul>
                            <li><a href="/admin/cate">分类列表</a></li>
                            <li><a href="/admin/cate/create">添加分类</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 商品管理</a>
                        <ul>
                            <li><a href="/admin/goods">商品列表</a></li>
                            <li><a href="/admin/goods/create">添加商品</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 文章管理</a>
                        <ul>
                            <li><a href="/admin/articles">文章列表</a></li>
                            <li><a href="/admin/articles/create">添加文章</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href="#"><i class="icon-list"></i> 轮播管理</a>
                        <ul>
                            <li><a href="/admin/carousel">轮播列表</a></li>
                            <li><a href="/admin/carousel/create">添加轮播</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href=""><i class="icon-list"></i> 友情链接</a>
                        <ul>
                            <li><a href="/admin/link">友情链接列表</a></li>
                            <li><a href="/admin/link/create">添加友情链接</a></li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li>
                        <a href=""><i class="icon-list"></i> 广告管理</a>
                        <ul>
                            <li><a href="/admin/adver">广告列表</a></li>
                            <li><a href="/admin/adver/create">广告添加</a></li>
                        </ul>
                    </li>
                </ul>
            </div>  
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                @if(session('success'))
                    <div class="mws-form-message success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mws-form-message error">
                        {{ session('error') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="mws-form-message error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            	@section('content')
                
                @show
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright Your Website 2012. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/Admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/Admin/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/Admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/Admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/Admin/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/Admin/jui/jquery-ui.custom.min.js"></script>
    <script src="/Admin/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <!--[if lt IE 9]>
    <script src="/Admin/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/Admin/plugins/flot/jquery.flot.min.js"></script>
    <script src="/Admin/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/Admin/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/Admin/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/Admin/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/Admin/plugins/colorpicker/colorpicker-min.js"></script>

    <!-- Core Script -->
    <script src="/Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Admin/js/core/mws.js"></script>

     Themer Script (Remove if not needed) 
     <script src="/Admin/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/Admin/js/demo/demo.charts.js"></script>

</body>
</html>