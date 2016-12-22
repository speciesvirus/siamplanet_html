<!DOCTYPE html>

<!--[if lt IE 7 ]>
<html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>
<html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>
<html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>
<html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Important stuff for SEO, don't neglect. (And don't dupicate values across your site!) -->
    <title>@yield('title')</title>
    <meta name="author" content=""/>
    <meta name="description" content=""/>

    <!-- Don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content=""/>

    <!-- Who owns the content of this site? -->
    <meta name="Copyright" content=""/>

    <!--  Mobile Viewport
    http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
    device-width : Occupy full width of the screen in its current orientation
    initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
    maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width (wrong for most sites)
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="theme-color" content="#003561">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#003561">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#003561">

@yield('meta')
<!-- Use Iconifyer to generate all the favicons and touch icons you need: http://iconifier.net -->
    <link rel="shortcut icon" href="favicon.ico"/>

    <!-- concatenate and minify for production -->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/css/reset.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/css/style.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/font-awesome/css/font-awesome.min.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/select2/dist/css/select2.min.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/css/main.css') }}" />-->
    <link rel="stylesheet" href="//resources/assets/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//resources/assets/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="//resources/assets/css/reset.css"/>
    <link rel="stylesheet" href="//resources/assets/css/style.css"/>

    <link rel="stylesheet" href="//resources/assets/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="//resources/assets/css/main.css"/>

    <!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
    {{--<script src="{{ asset('resources/assets/js/libs/prefixfree.min.js') }}"></script>--}}
    {{-- open --}}
    {{--<script src="//resources/assets/js/libs/prefixfree.min.js"></script>--}}

    <!-- This is a minimized, base version of Modernizr. (http://modernizr.com)
          You will need to create new builds to get the detects you need. -->
    {{--<script src="{{ asset('resources/assets/js/libs/modernizr-3.2.0.base.js') }}"></script>--}}
    {{-- open --}}
    {{--<script src="//resources/assets/js/libs/modernizr-3.2.0.base.js"></script>--}}

    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:url" content="">
    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>

</head>

<body>

<nav id="main-nav" class="clearfix bg">
    <div class="container">
        <a href="#home" id="nav-logo" title="siam planet">Siam Planet</a>
        <ul class="nav-menu unstyled">
            <li><a href="#about">ลงประกาศ <span class="yellow">ฟรี!</span></a></li>
            <li><a href="#event-highlights">ที่ดิน</a></li>
            <li><a href="#travel">บ้าน</a></li>
            <li><a href="#schedule">คอนโด</a></li>
            <li><a href="#schedule">ข่าว</a></li>
            <li><a href="#register" class="maia-button">เข้าสู่ระบบ</a></li>
        </ul>

        {{-- toggle menu --}}
        <div class="toggle-menu-container navicon">
            <button class="toggle-menu">
                <a href="javascript://" class="menu1">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </button>
        </div>
        <div class="navigation">
            <div class="nav-container">
                <ul class="search-tools">
                    <li class="top-search">
                        <form class="site-search" action="/property-search">
                            <input type="text" id="site-search-input" name="q" placeholder="ค้นหา">
                            <button type="submit" title="ค้นหา"><i class="pgicon pgicon-search"></i></button>
                            <button type="button" class="navbar-toggle">
                                <span class="sr-only">การแสดงหรือซ่อนเมนู</span>
                                <i class="pgicon pgicon-menu"></i>
                            </button>
                        </form>
                    </li>
                </ul>

                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="/รวมประกาศขาย" title="ประกาศขายอสังหาริมทรัพย์ในประเทศไทย" class="main-nav-a">ขาย</a>
                    </li>
                    <li class="">
                        <a href="/รวมประกาศให้เช่า" title="ประกาศเช่าอสังหาริมทรัพย์ในประเทศไทย"
                           class="main-nav-a">เช่า</a>
                    </li>
                    <li class="">
                        <a href="/โครงการ-คอนโด" title="คอนโดในประเทศไทย" class="main-nav-a">โครงการคอนโด</a>
                    </li>
                    <li class="">
                        <a href="/รวมโครงการใหม่" title="โครงการใหม่ในประเทศไทย" class="main-nav-a">โครงการใหม่</a>
                    </li>
                    <li class="">
                        <a href="/อสังหาฯ-เชิงพาณิชย์" title="อสังหาริมทรัพย์เชิงพาณิชย์"
                           class="main-nav-a">เชิงพาณิชย์</a>
                    </li>
                    <li class="">
                        <a href="/ข่าวอสังหาริมทรัพย์-บทความ" title="ข้อมูลตลาดอสังหาริมทรัพย์ในประเทศไทย"
                           class="main-nav-a">ข่าว</a>
                    </li>
                    <li class=" dropdown">
                        <a href="#" title="เพิ่มเติม" class="main-nav-a dropdown-toggle" data-toggle="dropdown">เพิ่มเติม</a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="">
                                <a href="/อสังหาริมทรัพย์ในต่างประเทศ"
                                   title="อสังหาริมทรัพย์ใน ประเทศไทย">ต่างประเทศ</a>
                            </li>
                            <li class="">
                                <a href="/นายหน้า" title="ค้นหาตัวแทนอสังหาริมทรัพย์ในประเทศไทย">ค้นหาตัวแทน</a>
                            </li>
                            <li class="">
                                <a href="/ถามกูรู" title="ถามกูรูเพื่อหาคำตอบเกี่ยวกับอสังหาริมทรัพย์ในประเทศไทย">ถามกูรู</a>
                            </li>
                            <li class="role_web_and_normal_show_link">
                                <a href="/ลงประกาศ" title="ลงประกาศ">ลงประกาศ</a>
                            </li>
                            <li class="role_agent_show_link">
                                <a href="//agentnet.ddproperty.com/ex_listings_active" title="ลงประกาศ">ลงประกาศ</a>
                            </li>
                            <li class=" accordion">
                                <a href="#" title="แหล่งข้อมูลอสังหาริมทรัพย์ในประเทศไทย" class="collapsed"
                                   data-toggle="collapse" data-target="#main-nav-accordion-1">คู่มือซื้อขาย<i
                                            class="pgicon pgicon-angle-down"></i><i class="pgicon pgicon-angle-up"></i></a>
                                <ul class="accordion-menu collapse" id="main-nav-accordion-1">
                                    <li class="">
                                        <a href="/คู่มือซื้อขาย" title="แหล่งข้อมูลอสังหาริมทรัพย์ในประเทศไทย">อ่านทั้งหมด</a>
                                    </li>
                                    <li class="">
                                        <a href="/คู่มือซื้อขาย/เตรียมตัวก่อนซื้อ"
                                           title="ฉันต้องการซื้ออสังหาริมทรัพย์">เตรียมตัวก่อนซื้อ</a>
                                    </li>
                                    <li class="">
                                        <a href="/คู่มือซื้อขาย/เตรียมตัวก่อนขาย"
                                           title="ฉันต้องการขายอสังหาริมทรัพย์ของฉัน">เตรียมตัวก่อนขาย</a>
                                    </li>
                                    <li class="">
                                        <a href="/คู่มือซื้อขาย/ควรรู้ก่อนให้เช่า"
                                           title="ฉันต้องการให้เช่าอสังหาริมทรัพย์ของฉัน">ควรรู้ก่อนให้เช่า</a>
                                    </li>
                                    <li class="">
                                        <a href="/คู่มือซื้อขาย/ควรรู้ก่อนเช่า" title="ฉันต้องการเช่าอสังหาริมทรัพย์">ควรรู้ก่อนเช่า</a>
                                    </li>
                                    <li class="">
                                        <a href="/property-mortgages-calculator" title="คำนวนสินเชื่อเพื่อที่อยู่อาศัย">คำนวนสินเชื่อเพื่อที่อยู่อาศัย</a>
                                    </li>
                                </ul>
                            </li>
                            <li class=" accordion">
                                <a href="#" title="สำหรับตัวแทน" class="collapsed" data-toggle="collapse"
                                   data-target="#main-nav-accordion-2">สำหรับตัวแทน<i
                                            class="pgicon pgicon-angle-down"></i><i class="pgicon pgicon-angle-up"></i></a>
                                <ul class="accordion-menu collapse" id="main-nav-accordion-2">
                                    <li class="">
                                        <a href="/ตัวแทน" title="แพ็คเกจสำหรับตัวแทน">แพ็คเกจสำหรับตัวแทน</a>
                                    </li>
                                    <li class="">
                                        <a href="//agentnet.ddproperty.com/ex_home" title="AgentNet">AgentNet</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!--// Translation Selector //-->
                <ul class="language-selector">
                    <li><a href="/en" class="en" title="EN">EN</a></li>
                    <li><a href="/" class="th" title="TH">TH</a></li>
                </ul>
                <!--// end: Translation Selector //-->
            </div>
        </div>

    </div>
</nav>

<div class="wrapper">


    <div class="header-search clearfix">
        <div class="advance-search header-advance-search">
            <form class="advance-search-form" action="#" method="get">
                <div class="inline-fields clearfix">
                    <div class="option-bar property-location">
                        <select name="location" id="location" data-title="Location" class="search-select">
                            <option value="any">จังหวัด ทั้งหมด</option>
                        </select>
                    </div>
                    <div class="option-bar property-type">
                        <select name="type" id="select-property-type" class="search-select">
                            <option value="any" selected="selected">ประเภท ทั้งหมด</option>
                            <option value="commercial"> Commercial</option>
                            <option value="office">- Office</option>
                            <option value="shop">- Shop</option>
                            <option value="residential"> Residential</option>
                            <option value="apartment">- Apartment</option>
                            <option value="apartment-building">- Apartment Building</option>
                            <option value="condominium">- Condominium</option>
                            <option value="single-family">- Single Family</option>
                            <option value="villa">- Villa</option>
                        </select>
                    </div>
                    <div class="option-bar property-status">
                        <select name="status" id="select-status" class="search-select">
                            <option value="any" selected="selected">ราคา ทั้งหมด</option>
                            <option value="for-rent"> Căn hộ</option>
                            <option value="for-sale"> Biệt thư</option>
                            <option value="for-sale"> Chung cư</option>
                        </select>
                    </div>
                    <div class="option-bar form-control-buttons">
                        <a class="hidden-fields-reveal-btn" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-plus-container" width="20" height="20"
                                 viewBox="0 0 20 20">
                                <g>
                                    <path class="icon icon-minus"
                                          d="M10.035 20.035c-2.092 0-4.313-.563-5.688-1.938-.406-.406-.688-.73-.688-1.141 0-.424.266-.859.891-.797.257.025.585.172.75.347 1.327.969 2.967 1.529 4.735 1.529 4.437 0 8.001-3.564 8.001-8.001 0-4.436-3.564-8-8.001-8-4.436 0-8 3.564-8 8 0 1.226.337 2.306.829 3.344 0 .001.277.495.313.938.04.491-.234.703-.656.875-.377.153-.859-.109-1.083-.452-.87-1.335-1.403-2.999-1.403-4.704 0-5.414 4.586-10 10-10 5.413 0 10 4.586 10 10 0 5.413-4.587 10-10 10zm-12-14v8-8zm16 5h-8c-.553 0-1-.447-1-1 0-.553.447-1 1-1h8c.553 0 1 .447 1 1 0 .553-.447 1-1 1z"/>
                                    <path class="icon icon-plus"
                                          d="M10.226 15.035c-.553 0-1-.447-1-1v-8c0-.553.447-1 1-1 .553 0 1 .447 1 1v8c0 .553-.447 1-1 1z"/>
                                </g>
                            </svg>
                        </a>
                        <input type="submit" value="ค้นหา กด ตรง นี้!" class="form-submit-btn">
                    </div>
                </div>
                <!-- .inline-fields -->
                <div class="hidden-fields clearfix">
                    <div class="option-bar property-bedrooms">
                        <select name="bedrooms" id="select-bedrooms" class="search-select">
                            <option value="any" selected="selected">ประกาศ ทั้งหมด</option>
                            <option value="1">ขาย</option>
                            <option value="2">เช่า</option>
                        </select>
                    </div>
                    <div class="option-bar property-min-price">
                        <select name="min-price" id="select-min-price" class="search-select">
                            <option value="any" selected="selected">ขนาดพื้นที่ ทั้งหมด</option>
                            <option value="1000">$1,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-bathrooms">
                        <select name="bathrooms" id="select-bathrooms" class="search-select">
                            <option value="any" selected="selected">โฉนด ทั้งหมด</option>
                            <option value="1">ประกาศเก่า</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="option-bar property-max-price">
                        <select name="max-price" id="select-max-price" class="search-select">
                            <option value="any" selected="selected">ประกาศล่าสุด</option>
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                            <option value="50000">$50,000</option>
                            <option value="100000">$100,000</option>
                            <option value="200000">$200,000</option>
                            <option value="300000">$300,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-max-price">
                        <select name="max-price" id="select-max-price" class="search-select">
                            <option value="any" selected="selected">ห้องนอน ทั้งหมด</option>
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                            <option value="50000">$50,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-max-price">
                        <select name="max-price" id="select-max-price" class="search-select">
                            <option value="any" selected="selected">ห้องนอน ทั้งหมด</option>
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-max-price">
                        <select name="max-price" id="select-max-price" class="search-select">
                            <option value="any" selected="selected">เฟอร์นิเจอร์ ทั้งหมด</option>
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-keyword">
                        <input type="text" name="keyword" id="keyword-txt" value="" placeholder="คำค้นหา (Keyword)"
                               title="Please only provide digits!"/>
                    </div>
                </div>
                <!-- .hidden-fields -->
            </form>
            <!-- .advance-search-form -->
        </div>
        <!-- .advance-search -->
    </div>

    <div id="breadcrumb" class="breadcrumb-page">
        <div class="container">
            <div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <span class="fa fa-home fa-fw"></span>
                <a href="https://wp-simplicity.com" itemprop="url">
                    <span itemprop="title">หน้าหลัก</span>
                </a>
            </div>

            <span class="sp">
                    <span class="fa fa-angle-right"></span>
            </span>

            <div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <span class="fa fa-file-o fa-fw"></span>
                <a href="https://wp-simplicity.com/downloads/" itemprop="url">
                    <span itemprop="title">Simplicityのダウンロード</span>
                </a>
            </div>
        </div>
    </div>
    <!-- .header-bottom -->


    <div class="page">

        <section class="first-section">
            <div class="container list-article">
                <div class="row">

                    @yield('first-content')

                </div>

            </div>
        </section>

        <section class="second-section">
            <div class="container list-article">
                <div class="row">

                    @yield('second-content')

                </div>

            </div>
        </section>

        <section class="third-section">
            <div class="container list-article">
                <div class="row">

                    @yield('third-content')

                </div>

            </div>
        </section>

    </div>


    <footer class="footer">

        <div class="container">
            <div class="col-md-6"><span id="fsl">&copy; Copyright Siam Planet. All Rights Reserved.</span></div>
            <div class="col-md-6">
                <span id="fsr">
                    <a class="_Gs" href="//www.google.co.th/intl/th/policies/privacy/?fg=1">ความเป็นส่วนตัว</a>
                    <a class="_Gs" href="//www.google.co.th/intl/th/policies/terms/?fg=1">ข้อกำหนด</a>
                    <a class="_Gs" href="//www.google.co.th/intl/th/policies/terms/?fg=1">ข้อกำหนด</a>
                </span>
            </div>

        </div>

    </footer>

</div>

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='{{ asset('resources/assets/js/components/jquery-1.11.3.min.js') }}'>\x3C/script>")</script>

<!--<script src="{{ asset('resources/assets/select2/dist/js/select2.full.min.js') }}"></script>-->
<script src="resources/assets/select2/dist/js/select2.full.min.js"></script>
@yield('script')
<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify for production -->
<!--<script src="{{ asset('resources/assets/js/functions.js') }}"></script>-->
<script src="resources/assets/js/functions.js"></script>
{{--<script>$(document).ready(initPage);</script>--}}

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXX-XX', 'auto');
  ga('send', 'pageview');

</script>
-->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1724713611112155";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


</body>
</html>
