<div class="sidebar-widget">
    <aside id="archives-3" class="widget widget_archive"><h3 class="widget_title sidebar_widget_title">
            ย้อนหลัง</h3>
        <ul class="years">
            @for ($i = date("Y"); $i > (date("Y") - 4); $i--)
                <li class="year_{{ $i }}"><a href="javascript://" class="year">{{ $i }}</a>
                    <ul class="month {{ $i != date("Y") ? 'hide' : '' }}">
                        @foreach($navigator_previous as $key => $value)
                            @if($i == $value->year)
                                <li><a href="{{ route('home') }}/?previous={{ $value->year }}-{{ explode(' ',$value->month)[0] }}">{!! $value->month !!}</a> ({{ $value->total }})</li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endfor



            {{--<li class="year_2016"><a class="year">2016年</a>--}}
            {{--<ul class="month">--}}
            {{--<li><a href="https://wp-simplicity.com/2016/12/">12月</a> (1)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/11/">11月</a> (11)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/10/">10月</a> (11)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/09/">9月</a> (5)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/08/">8月</a> (8)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/07/">7月</a> (4)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/06/">6月</a> (7)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/05/">5月</a> (4)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/04/">4月</a> (7)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/03/">3月</a> (4)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/02/">2月</a> (11)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2016/01/">1月</a> (6)</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="year_2015"><a class="year">2015年</a>--}}
            {{--<ul class="month hide">--}}
            {{--<li><a href="https://wp-simplicity.com/2015/12/">12月</a> (6)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/11/">11月</a> (6)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/10/">10月</a> (2)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/09/">9月</a> (7)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/08/">8月</a> (4)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/07/">7月</a> (12)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/06/">6月</a> (11)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/05/">5月</a> (9)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/04/">4月</a> (8)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/03/">3月</a> (10)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/02/">2月</a> (10)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2015/01/">1月</a> (13)</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--<li class="year_2014"><a class="year">2014年</a>--}}
            {{--<ul class="month hide">--}}
            {{--<li><a href="https://wp-simplicity.com/2014/12/">12月</a> (14)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2014/11/">11月</a> (17)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2014/10/">10月</a> (18)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2014/09/">9月</a> (19)</li>--}}
            {{--<li><a href="hattps://wp-simplicity.com/2014/08/">8月</a> (31)</li>--}}
            {{--<li><a href="https://wp-simplicity.com/2014/07/">7月</a> (33)</li>--}}
            {{--</ul>--}}
            {{--</li>--}}
        </ul>
    </aside>
</div>