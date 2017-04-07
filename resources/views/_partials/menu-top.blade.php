
<ul class="nav-menu unstyled">
    <li><a href="{{ route('post') }}">ลงประกาศ <span class="yellow">ฟรี!</span></a></li>
    <li><a href="{{ route('home') }}?type=ที่ดิน">ที่ดิน</a></li>
    <li><a href="{{ route('home') }}?type=บ้าน">บ้าน</a></li>
    <li><a href="{{ route('home') }}?type=คอนโด">คอนโด</a></li>
    <li><a href="{{ route('news') }}">ข่าว</a></li>

    @if(Auth()->check())
        <li><a href="javascript://" id="opl">Hi, {{ Auth::user()->first_name }}</a>
        <ul>
            <div class="user-account-main" data-role="user-account-main">
                <div class="flyout-user-signout" data-role="signout-btn" style="display: block;">
                    <a href="{{ route('auth.logout') }}" rel="nofollow">Sign Out</a>
                </div>
                <ul class="flyout-quick-entry" data-role="quick-entry">
                    <li><a href="{{ route('user.home') }}" rel="nofollow">ข้อมูลส่วนตัว</a></li>
                    <li><a href="{{ route('post.product') }}" rel="nofollow">ลงประกาศ</a></li>
                    <li><a href="{{ route('post.review') }}" rel="nofollow">ลงประกาศรีวิว</a></li>
                    <li><a href="{{ route('news') }}" rel="nofollow">ข่าว</a></li>
                </ul>
            </div>
        </ul>

        </li>
    @else
        <li><a href="{{ route('login') }}" class="maia-button">เข้าสู่ระบบ</a></li>
    @endif

</ul>








