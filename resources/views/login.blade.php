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
    <link rel="stylesheet" href="resources/assets/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="resources/assets/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="resources/assets/css/reset.css"/>
    <link rel="stylesheet" href="resources/assets/css/style.css"/>

    <link rel="stylesheet" href="resources/assets/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="resources/assets/css/main.css"/>

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
    </div>
</nav>

<div class="wrapper">



    <div class="page login-page">

        <div class="container">
            <div class="div-login">
                <form name="login-form" class="login-form" method="POST" action="{{ route('user.login') }}">
                    {{ csrf_field() }}
                    <div class="header">
                        <h1 class="top-header">Login Form</h1>
                        <span>Fill out the form below to login to my super awesome imaginary control panel.</span>
                        <div class="login-social">
                            <div class="form-group">
                                <a class="enlace facebook" href="{{ route('social.redirect', 'facebook') }}">facebook</a>
                                <a class="enlace google" href="{{ route('social.redirect', 'google') }}">google</a>
                            </div>
                        </div>
                    </div>

                    <div class="content">
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <input name="user" type="text" class="form-control username" placeholder="Username" value="{{ old('user') }}">
                            <span class="help-inline">{{ $errors->has('user') ? $errors->first('user') : '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
                            <input name="pass" type="password" class="form-control password" placeholder="Password">
                            <span class="help-inline">{{ $errors->has('pass') ? $errors->first('pass') : '' }}</span>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="proceed">Log-in to your account <i class="ion-ios-arrow-thin-right"></i></button>
                    </div>
                </form>

                @if(Session::has('alert-message'))

                    <div class="alert {{ Session::get('code') == 0 ? 'alert-info' : 'alert-warning' }}">
                        <h3>{{Session::get('alert-message')}}</h3>
                    </div>

                @endif

            </div>

            <div class="div-join">

                <h1 class="top-header">Join</h1>

                <form id="girisyap" name="signup_form" method="post"  action="{{ route('join') }}">
                    {{ csrf_field() }}
                    <div>
                        <div class="col-md-6">
                            <div class="row" style="margin-right: -10px">
                                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                    <input name="first_name" type="text" class="form-control" placeholder="ชื่อ" value="{{ old('first_name') }}">
                                    <span class="help-inline">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row" style="margin-left: -10px">
                                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                    <input name="last_name" type="text" class="form-control" placeholder="นามสกุล" value="{{ old('last_name') }}">
                                    <span class="help-inline">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input name="email" type="email" class="form-control" placeholder="อีเมล" value="{{ old('email') }}">
                        <span class="help-inline">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                        <input name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้" value="{{ old('username') }}">
                        <span class="help-inline">{{ $errors->has('username') ? $errors->first('username') : '' }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input name="password" type="password" class="form-control" placeholder="รหัสผ่าน">
                        <span class="help-inline">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="รหัสผ่านอีกครั้ง">
                        <span class="help-inline">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
                    </div>





                    <p class="agree">เมื่อคลิก สร้างบัญชีผู้ใช้ แสดงว่าคุณยินยอมตาม<a href="/legal/terms" id="terms-link" target="_blank" rel="nofollow">ข้อกำหนด</a>และคุณได้อ่าน<a href="/about/privacy" id="privacy-link" target="_blank" rel="nofollow">นโยบายข้อมูล</a>ของเราแล้ว
                        รวมถึง<a href="/policies/cookies/" id="cookie-use-link" target="_blank" rel="nofollow">การใช้คุกกี้</a></p>

                    <button type="submit" class="join-btn">Create an account </button>

                </form>
            </div>
        </div>

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
