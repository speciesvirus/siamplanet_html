
@if ($breadcrumbs)

    <div id="breadcrumb" class="breadcrumb-page">
        <div class="container">

            @foreach ($breadcrumbs as $key => $breadcrumb)
                @if (!$breadcrumb->last)
                    <div>
                        <a href="{{ $breadcrumb->url }}">
                            @if ($key == 0)
                                <span class="fa fa-home fa-fw"></span>
                            @endif
                            <span>{{ $breadcrumb->title }}</span>
                        </a>
                    </div>
                    <span class="sp"><span class="fa fa-angle-right"></span></span>
                @else

                    <div>

                        {{--<span class="fa fa-file-o fa-fw"></span>--}}
                        <a href="javascript://">
                            @if (count($breadcrumbs) == 1)
                                <span class="fa fa-home fa-fw"></span>
                            @endif
                            <span>{{ $breadcrumb->title }}</span>
                        </a>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
@endif

{{--<div id="breadcrumb" class="breadcrumb-page">--}}
    {{--<div class="container">--}}
        {{--<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">--}}
            {{--<span class="fa fa-home fa-fw"></span>--}}
            {{--<a href="https://wp-simplicity.com" itemprop="url">--}}
                {{--<span itemprop="title">หน้าหลัก</span>--}}
            {{--</a>--}}
        {{--</div>--}}

        {{--<span class="sp">--}}
                    {{--<span class="fa fa-angle-right"></span>--}}
            {{--</span>--}}

        {{--<div itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">--}}
            {{--<span class="fa fa-file-o fa-fw"></span>--}}
            {{--<a href="https://wp-simplicity.com/downloads/" itemprop="url">--}}
                {{--<span itemprop="title">Simplicityのダウンロード</span>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}