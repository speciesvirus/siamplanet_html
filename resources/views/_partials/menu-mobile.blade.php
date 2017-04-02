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
        <div class="fly-wrap-in">
            <div class="fly-side-wrap">
                <ul class="fly-bottom-soc left relative">
                    <li class="fb-soc">
                        <a href="https://www.facebook.com/nainamofficial/" target="_blank">
                            <i class="fa fa-facebook-square fa-2"></i>
                        </a>
                    </li>
                    <li class="twit-soc">
                        <a href="http://www.twitter.com/mvpthemes" target="_blank">
                            <i class="fa fa-twitter fa-2"></i>
                        </a>
                    </li>
                    <li class="pin-soc">
                        <a href="http://www.pinterest.com/envato" target="_blank">
                            <i class="fa fa-pinterest fa-2"></i>
                        </a>
                    </li>
                    <li class="inst-soc">
                        <a href="http://www.instagram.com/envato" target="_blank">
                            <i class="fa fa-instagram fa-2"></i>
                        </a>
                    </li>
                    <li class="goog-soc">
                        <a href="https://plus.google.com/u/0/communities/104195046153097388094" target="_blank">
                            <i class="fa fa-google-plus fa-2"></i>
                        </a>
                    </li>
                    <li class="yt-soc">
                        <a href="https://www.youtube.com/user/envato" target="_blank">
                            <i class="fa fa-youtube-play fa-2"></i>
                        </a>
                    </li>
                    <li class="link-soc">
                        <a href="https://www.linkedin.com/company/envato" target="_blank">
                            <i class="fa fa-linkedin fa-2"></i>
                        </a>
                    </li>
                    <li class="tum-soc">
                        <a href="http://wonderfulworldofwebdesign.tumblr.com/" target="_blank">
                            <i class="fa fa-tumblr fa-2"></i>
                        </a>
                    </li>
                    <li class="rss-soc">
                        <a href="http://www.mvpthemes.com/flexmag/feed/rss/" target="_blank">
                            <i class="fa fa-rss fa-2"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <ul class="nav navbar-nav">

            <li><a class="main-nav-a" href="{{ route('post') }}">ลงประกาศ <span class="yellow">ฟรี!</span></a></li>
            <li><a class="main-nav-a" href="{{ route('home') }}?type=ที่ดิน">ที่ดิน</a></li>
            <li><a class="main-nav-a" href="{{ route('home') }}?type=บ้าน">บ้าน</a></li>
            <li><a class="main-nav-a" href="{{ route('home') }}?type=คอนโด">คอนโด</a></li>
            <li><a class="main-nav-a" href="{{ route('news') }}" title="ข้อมูลตลาดอสังหาริมทรัพย์ในประเทศไทย">ข่าว</a></li>

            @if(Auth()->check())
                <li class="li-section li-user">Hi, {{ Auth::user()->first_name }}</li>
                <li class=""><a href="{{ route('user.home') }}">ข้อมูลส่วนตัว</a></li>
                <li><a href="{{ route('auth.logout') }}" class="">ออกระบบ</a></li>
            @else
                <li><a href="{{ route('login') }}" class="li-section li-user">เข้าสู่ระบบ</a></li>
            @endif

        </ul>
    </div>
</div>