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
    <link rel="shortcut icon" href="{{ asset('resources/assets/images/favicon_32.png', env('HTTPS')) }}"/>

    <!-- concatenate and minify for production -->

    <link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/font-awesome/css/font-awesome.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/user/reset.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/user/style.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/user/main.css', env('HTTPS')) }}" />

@yield('style')
<!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
{{--<script src="{{ asset('resources/assets/prefixfree/prefixfree.min.js', env('HTTPS')) }}"></script>--}}

<!-- This is a minimized, base version of Modernizr. (http://modernizr.com)
          You will need to create new builds to get the detects you need. -->
    <script src="{{ asset('resources/assets/js/components/modernizr-3.2.0.base.js', env('HTTPS')) }}"></script>


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
        <a class="navbar-brand" href="{{ route('home') }}">
            <img alt="Brand" src="{{ asset('resources/assets/images/nainam_logo_top_blue_300.png', env('HTTPS')) }}">
        </a>
        <a href="{{ route('home') }}" id="nav-logo" title="nainam">Nainam</a>

        {{--!!* Menu Top--}}
        @include('_partials.menu-top')

        {{-- toggle menu on mobile --}}
        @include('_partials.menu-mobile')

    </div>
</nav>

<div class="wrapper">


    <!-- .header-bottom -->
    @yield('content')



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
<script type="text/javascript" src="{{ asset('resources/assets/js/components/jquery-1.11.3.min.js', env('HTTPS')) }}"></script>

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

</body>
</html>
