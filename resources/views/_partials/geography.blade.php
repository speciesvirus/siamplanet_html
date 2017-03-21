
{{--{{ dd($geo) }}--}}


<div class="side-panel bs-docs-sidebar">
    <h3 class="side-list-title">Geography</h3>
    <ul class="bullet-list-round">
        @foreach($navigator_geo as $t)
            <li>
                {{ $t['name'] }}
                <ul class="bullet-list-round">
                    @foreach($t['arr'] as $g)
                        <li>
                            {{ $g['name'] }}
                            <ul class="bullet-list-round">
                                @foreach($g['arr'] as $p)
                                    <li>
                                        <a href="{{ route('home') }}?type={{ $t['name'] }}&geo={{ $g['name'] }}&province={{ $p['name'] }}">{{ $p['name'] }}</a> ({{ $p['count'] }})
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>

    {{--<ul class="bullet-list-round">--}}
        {{--<li>--}}
            {{--ที่ดิน--}}
            {{--<ul class="bullet-list-round open">--}}
                {{--<li>--}}
                    {{--ภาคกลาง--}}
                    {{--<ul class="bullet-list-round open">--}}
                        {{--<li>--}}
                            {{--<a href="#">กรุงเทพมหานคร</a> (15)--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--ที่ดิน--}}
            {{--<ul class="bullet-list-round open">--}}
                {{--<li>--}}
                    {{--ภาคกลาง--}}
                    {{--<ul class="bullet-list-round open">--}}
                        {{--<li>--}}
                            {{--<a href="#">กรุงเทพมหานคร</a> (15)--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    {{--</ul>--}}

</div>