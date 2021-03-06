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

    <!-- Don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content="gBboO71O0fRrsusEwGLSPVk48jEwGaWfKO_LbOtsVe8" />

    <!-- Who owns the content of this site? -->
    <meta name="Copyright" content="nainam"/>

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

    <link rel="shortlink" href="{{ request()->getUri() }}">
    <meta property="fb:app_id" content="693544830831851">
    <meta property="og:locale" content="th_TH">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="Nainam">
    <meta property="og:url" content="{{ request()->getUri() }}" />

    <meta name="twitter:url" content="{{ request()->getUri() }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@nainamofficial">

@yield('meta')
<!-- Use Iconifyer to generate all the favicons and touch icons you need: http://iconifier.net -->
    <link rel="shortcut icon" href="{{ asset('resources/assets/images/favicon_32.png', env('HTTPS')) }}"/>

    <!-- concatenate and minify for production -->

    <link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/font-awesome/css/font-awesome.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/reset.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/style.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/select2/dist/css/select2.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/main.css', env('HTTPS')) }}" />

    <!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
    {{--<script src="{{ asset('resources/assets/prefixfree/prefixfree.min.js', env('HTTPS')) }}"></script>--}}
</head>

<body>

<nav id="main-nav" class="clearfix bg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img alt="Brand" src="{{ asset('resources/assets/images/nainam_logo_top_300.png', env('HTTPS')) }}">

        </a>
        <a href="{{ route('home') }}" id="nav-logo" title="nainam">Nainam</a>

        {{--!!* Menu Top--}}
        @include('_partials.menu-top')

        {{-- toggle menu on mobile --}}
        @include('_partials.menu-mobile')

    </div>
</nav>

<div class="wrapper">

    <div class="header-search clearfix">
        <div class="advance-search header-advance-search">
            <form name="search" class="advance-search-form" action="{{ route('home.search') }}" method="get">
                <div class="inline-fields clearfix">
                    <div class="option-bar property-location">
                        {{ Form::select('s_type', $navigator_type, isset($s_type) ? $s_type : '',[
                                'class' => 'search-select',
                                'data-title' => 'type',
                            ])
                         }}
                    </div>
                    <div class="option-bar property-type">
                        {{ Form::select('s_price', $navigator_price, isset($s_price) ? $s_price : '',[
                                'class' => 'search-select',
                                'data-title' => 'price',
                            ])
                         }}
                    </div>
                    <div class="option-bar property-status">
                        {{ Form::select('s_size', $navigator_size, isset($s_size) ? $s_size : '',[
                                'class' => 'search-select',
                                'data-title' => 'size',
                            ])
                         }}
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
                        {{ Form::select('s_sale', $navigator_sale, isset($s_sale) ? $s_sale : '',[
                                'class' => 'search-select',
                                'data-title' => 'Sale',
                            ])
                         }}
                    </div>
                    <div class="option-bar property-min-price">
                        {{ Form::select('s_subway', $navigator_subway, isset($s_subway) ? $s_subway : '',[
                            'class' => 'search-select',
                            'data-title' => 'subway',
                            ])
                        }}
                    </div>
                    <div class="option-bar property-bathrooms">
                        {{ Form::select('s_province', $navigator_province, isset($s_province) ? $s_province : '',[
                                'class' => 'search-select',
                                'data-title' => 'province',
                            ])
                         }}
                    </div>
                    <div class="option-bar property-keyword">
                        <input type="text" name="s_keyword" id="keyword-txt" value="{{ isset($s_keyword) ? $s_keyword : '' }}" placeholder="คำค้นหา (Keyword)"
                               title="Keyword"/>
                    </div>
                    {{--<div class="option-bar property-max-price">--}}
                        {{--<select name="max-price" id="select-max-price" class="search-select">--}}
                            {{--<option value="any" selected="selected">ประกาศล่าสุด</option>--}}
                            {{--<option value="5000">$5,000</option>--}}
                            {{--<option value="10000">$10,000</option>--}}
                            {{--<option value="50000">$50,000</option>--}}
                            {{--<option value="100000">$100,000</option>--}}
                            {{--<option value="200000">$200,000</option>--}}
                            {{--<option value="300000">$300,000</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="option-bar property-max-price">--}}
                        {{--<select name="max-price" id="select-max-price" class="search-select">--}}
                            {{--<option value="any" selected="selected">บริเวณรถไฟฟ้า ทั้งหมด</option>--}}
                            {{--<option value="5000">$5,000</option>--}}
                            {{--<option value="10000">$10,000</option>--}}
                            {{--<option value="50000">$50,000</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="option-bar property-max-price">--}}
                        {{--<select name="max-price" id="select-max-price" class="search-select">--}}
                            {{--<option value="any" selected="selected">เฟอร์นิเจอร์ ทั้งหมด</option>--}}
                            {{--<option value="5000">$5,000</option>--}}
                            {{--<option value="10000">$10,000</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                    {{--<div class="option-bar property-max-price">--}}
                        {{--<select name="max-price" id="select-max-price" class="search-select">--}}
                            {{--<option value="any" selected="selected">จังหวัด ทั้งหมด</option>--}}
                            {{--<option value="5000">$5,000</option>--}}
                            {{--<option value="10000">$10,000</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                </div>
                <!-- .hidden-fields -->
            </form>
            <!-- .advance-search-form -->
        </div>
        <!-- .advance-search -->
    </div>
        @if(isset($product))
            {!! Breadcrumbs::render('product', $product) !!}
        @elseif(isset($news))
            {!! Breadcrumbs::render('news.view', $news) !!}
        @elseif(isset($category))
            {!! Breadcrumbs::render('news.category', $category) !!}
        @else
            {!! Breadcrumbs::render() !!}
        @endif

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
            <div class="col-md-6 ft-m-h"><span id="fsl">&copy; Copyright nainam. All rights reserved.</span></div>
            <div class="col-md-6">
                <span id="fsr">
                    <a target="_blank" class="_Gs" href="https://m.me/nainamofficial/">ส่งความคิดเห็น</a>
                    <a target="_blank" class="_Gs" href="{{ route('policies.privacy') }}">ความเป็นส่วนตัว</a>
                    <a target="_blank" class="_Gs" href="{{ route('policies.terms') }}">ข้อกำหนด</a>
                    {{--<a class="_Gs" href="//www.google.co.th/intl/th/policies/terms/?fg=1">ข้อกำหนด</a>--}}
                </span>
            </div>
            <div class="col-md-6 ft-m-s"><span id="fsl">&copy; Copyright nainam. All rights reserved.</span></div>
        </div>

    </footer>

</div>

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script type="text/javascript" src="{{ asset('resources/assets/js/components/jquery-1.11.3.min.js', env('HTTPS')) }}"></script>

<script type="text/javascript" src="{{ asset('resources/assets/select2/dist/js/select2.full.min.js', env('HTTPS')) }}"></script>
<script type="text/javascript" src="{{ asset('resources/assets/js/functions.js', env('HTTPS')) }}"></script>

@yield('script')
<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify for production -->

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


<div id="dialog" class="dialog">
    <div class="dialog-overlay"></div>
    <div class="dialog-content">
        <div class="loader">
            <ul class="hexagon-container">
                <li class="hexagon hex_1"></li>
                <li class="hexagon hex_2"></li>
                <li class="hexagon hex_3"></li>
                <li class="hexagon hex_4"></li>
                <li class="hexagon hex_5"></li>
                <li class="hexagon hex_6"></li>
                <li class="hexagon hex_7"></li>
            </ul>
        </div>
    </div>
</div>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=693544830831851";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96831598-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
