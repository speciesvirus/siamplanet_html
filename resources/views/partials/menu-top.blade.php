


<ul class="nav-menu unstyled">
    <li><a href="#about">ลงประกาศ <span class="yellow">ฟรี!</span></a></li>
    <li><a href="#event-highlights">ที่ดิน</a></li>
    <li><a href="#travel">บ้าน</a></li>
    <li><a href="#schedule">คอนโด</a></li>
    <li><a href="#schedule">ข่าว</a></li>

    @if(Auth()->check())
        <li><a href="javascript://" id="opl">{{ Auth::user()->first_name }}</a></li>
    @else
        <li><a href="{{ route('login') }}" class="maia-button">เข้าสู่ระบบ</a></li>
    @endif

</ul>

<div class="overlay"></div>
<div class="popup four">
    <p>This is a simple popup</p>
    <ul>
        <li><button id="cpl">Close</button></li>
        <li><button>View More</button></li>
    </ul>
</div>





