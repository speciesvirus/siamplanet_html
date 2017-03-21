
<ul class="nav-menu unstyled">
    <li><a href="{{ route('post') }}">ลงประกาศ <span class="yellow">ฟรี!</span></a></li>
    <li><a href="{{ route('home') }}?type=ที่ดิน">ที่ดิน</a></li>
    <li><a href="{{ route('home') }}?type=บ้าน">บ้าน</a></li>
    <li><a href="{{ route('home') }}?type=คอนโด">คอนโด</a></li>
    <li><a href="{{ route('news') }}">ข่าว</a></li>

    @if(Auth()->check())
        <li><a href="javascript://" id="opl">{{ Auth::user()->first_name }}</a></li>
    @else
        <li><a href="{{ route('login') }}" class="maia-button">เข้าสู่ระบบ</a></li>
    @endif

</ul>

@if(Auth()->check())
    <div class="overlay"></div>
    <div class="popup four">
        <ul>
            {{--<li><button id="cpl">Close</button></li>--}}
            <li class=""><a href="javascript://">ข้อมูลส่วนตัว</a></li>
            <li><a href="{{ route('auth.logout') }}" class="">ออกระบบ</a></li>
        </ul>
    </div>
@endif







