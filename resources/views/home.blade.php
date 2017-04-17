@extends('layouts.main')
@section('title', 'Nainam')
@section('meta')
    <meta name="keywords" content="คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง บ้านใหม่ โครงการใหม่ คอนโดใหม่ ข่าว">
    <meta name="description" content="nainam.com - รวบรวม คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง ครบถ้วนและอัพเดทที่สุด พร้อมแผนที่ทุกประกาศ สไตล์คุณ">
    <meta property="article:author" content="nainam" />
    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->

    <meta name="twitter:creator" content="@nainam">
    <meta name="twitter:title" content="Nainam">
    <meta name="twitter:description" content="Nainam | รวบรวม ที่ดิน บ้าน คอนโด ทาวน์เฮ้าส์ อื่นๆ ครบถ้วน ทุกทำเลท ออกแบบได้สไตล์คุณ">

    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="nainam"/>
    <meta property="og:description" content="Nainam | รวบรวม ที่ดิน บ้าน คอนโด ทาวน์เฮ้าส์ อื่นๆ ครบถ้วน ทุกทำเลท ออกแบบได้สไตล์คุณ"/>
    <meta property="og:image" content="{{ asset('resources/assets/images/nainam_logo_top_blue_300.png', env('HTTPS')) }}"/>
    <meta property="og:image:width" content="{{ getimagesize(asset('resources/assets/images/nainam_logo_top_blue_300.png', env('HTTPS')))[0] }}"/>
    <meta property="og:image:height" content="{{ getimagesize(asset('resources/assets/images/nainam_logo_top_blue_300.png', env('HTTPS')))[1] }}"/>
@stop

@section('source')

@stop

@section('script')
    <script type="text/javascript">
        if (window.location.hash && window.location.hash == '#_=_') {
            window.location.hash = '';
        }

        $(document).on('click', '.pagination button', function () {
            var $this = $(this).find('a').attr('href');
            //alert($(this).find('a').attr('class'));
            if (typeof $this != 'undefined') window.location.href = $this;
        });

        $(document).on('click', '.phone a', function () {
            var $this = $(this),
                $id = $this.parents('.blog-card').data('id');
            $.ajax({
                url: "{{ route('phone.view') }}",
                type: "post",
                data: {id: $id},
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (json) {
                    $this.html(json.phone);
                },
                error: function (jqXhr, json, errorThrown) {
                    var errors = jqXhr.responseJSON;
                    console.log(errors);
                }
            });
        });
    </script>
@stop

@section('first-content')
    <div class="col-md-9">
        <div class="row">

            <div class="container">
                <h1 class="entry-title"></h1>
            </div>

            @foreach($pagination->items() as $item)
                <div class="col-md-6">
                    <div class="blog-card" data-id="{{ $item['attributes']['id'] }}">
                        {!! $item->status == config('global.sold_out') ? '<a class="sold_out" href="javascript://">Sold out</a>' : '' !!}
                        <div class="photo photo1"
                             style="background: url({{ $image($item['attributes']['image']) }}) center no-repeat;background-size: cover;"></div>
                        <ul class="details">
                            <li class="author"><a href="#">{{ $item['attributes']['seller'] }}</a></li>
                            <li class="phone"><a href="javascript://">กดเพื่อดูเบอร์</a></li>
                            <li class="share">
                                <ul>
                                    <li><a href="http://www.facebook.com/sharer.php?u={{ route('home').'/'.$item['attributes']['id'] }}"
                                       onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=350,width=520');return false;"
                                       title="Facebook" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text={{ $item['attributes']['title'] }}&url={{ route('home').'/'.$item['attributes']['id'] }}"
                                       onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=420,width=550');return false;"
                                       title="Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="https://plus.google.com/share?url={{ route('home').'/'.$item['attributes']['id'] }}"
                                       onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=600,width=600');return false;"
                                       title="Google+" target="_blank"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="description">
                            <h1>
                                <a href="{{ route('product').'/'.$item['attributes']['id'] }}">{{ $item['attributes']['title'] }}</a>
                            </h1>
                            <h2>{{ number_format($item['attributes']['price']) }} ฿ / {{ $item['attributes']['sale'] }}
                                / <a href="{{ route('home') }}?type={{ $item->type }}">{{ $item['attributes']['type'] }}</a></h2>
                            <h3>{{ $current_unit($item['attributes']['unit'], $item['attributes']['unit_id']) }} {{ $item->unit_name }}
                                / {{ $cal_unit($item['attributes']['price'], $item['attributes']['unit']) }}
                                ฿ : ตารางเมตร</h3>
                            <p class="summary">{{ $item['attributes']['subtitle'] }}</p>
                            <p class="province">{{ $item['attributes']['province'] }}</p>
                            <div class="card-media-body-supporting-bottom">
                                <!--<span class="card-media-body-supporting-bottom-text subtle">Mezzanine, San Francisco, CA</span>-->
                                <span class="card-media-body-supporting-bottom-text subtle u-float-right">{{ $trans_time($item['attributes']['created_at']) }}</span>
                            </div>
                            <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                                {{--<span class="card-media-body-supporting-bottom-text subtle">ดู {{ number_format($item['attributes']['view']) }}--}}
                                    {{--ครั้ง</span>--}}
                                <a href="{{ route('product').'/'.$item['attributes']['id'] }}" class="card-media-body-supporting-bottom-text u-float-right">
                                    ดู {{ number_format($item['attributes']['view']) }} ครั้ง
                                </a>
                                {{--<a href="#/" class="card-media-body-supporting-bottom-text card-favorite-link u-float-right"></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{--<div class="col-md-6">--}}
            {{--<div class="blog-card">--}}
            {{--<div class="photo photo1"></div>--}}
            {{--<ul class="details">--}}
            {{--<li class="author"><a href="#">Angel Real Estate Consultancy Co.,Ltd (ARE)</a></li>--}}
            {{--<li class="phone"><a href="#">กดเพื่อดูเบอร์</a></li>--}}
            {{--<li class="share">--}}
            {{--<ul>--}}
            {{--<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
            {{--<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>--}}
            {{--</ul>--}}
            {{--</li>--}}
            {{--</ul>--}}
            {{--<div class="description">--}}
            {{--<h1>Off-Plan Condo for sale in Bangkok Near Triple Station Transportation</h1>--}}
            {{--<h2>356,000,000 ฿ / ขาย / <a href="#">คอนโด</a></h2>--}}
            {{--<h3>34 ไร่ 3 งาน 100 ตารางวา / 125 ฿ : ตารางเมตร</h3>--}}
            {{--<p class="summary">ขายดาวน์ คอนโดใหม่ บนถนนสาทร-นราธิวาส</p>--}}
            {{--<p class="province">กรุงเทพ</p>--}}
            {{--<div class="card-media-body-supporting-bottom">--}}
            {{--<!--<span class="card-media-body-supporting-bottom-text subtle">Mezzanine, San Francisco, CA</span>-->--}}
            {{--<span class="card-media-body-supporting-bottom-text subtle u-float-right">1 ชั่วโมง ที่แล้ว</span>--}}
            {{--</div>--}}
            {{--<div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">--}}
            {{--<span class="card-media-body-supporting-bottom-text subtle">ดู 256,802 ครั้ง</span>--}}
            {{--<a href="#/"--}}
            {{--class="card-media-body-supporting-bottom-text card-favorite-link u-float-right"></a>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            @if($pagination->lastPage() != 0)

                <div class="pagination__container">
                    <div class="pagination__wrapper">
                        <ul class="pagination">


                            @if($pagination->lastPage() > 1)
                                <li>
                                    <button class="prev" title="previous page"><a
                                                href="{{ $pagination->previousPageUrl() }}">&#10094;</a></button>
                                </li>
                            @endif

                            @for ($i = ($pagination->currentPage() - $pagination->perPage()); $i < (($pagination->currentPage() + $pagination->perPage())); $i++)

                                @if(($i > 0) && ($i < ($pagination->total() / $pagination->perPage()) + 1))
                                    @if($i == $pagination->currentPage())
                                        <li>
                                            <button class="active"
                                                    title="current page - page {{ $pagination->currentPage() }}">{{ $pagination->currentPage() }}</button>
                                        </li>
                                    @else
                                        <li>
                                            <button title="page {{ $i }}"><a
                                                        href="{{ $pagination->url($i) }}">{{ $i }}</a></button>
                                        </li>
                                    @endif
                                @endif

                            @endfor

                            @if(($pagination->currentPage() != $pagination->lastPage()))
                                <li>
                                    <button class="next" title="next page"><a href="{{ $pagination->nextPageUrl() }}">
                                            &#10095;</a></button>
                                </li>
                            @endif



                            {{--<li><button class="prev" title="previous page">&#10094;</button></li>--}}
                            {{--<li>--}}
                            {{--<button title="first page - page 1">1</button>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<span>...</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<button title="page 8">8</button>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<button class="active" title="current page - page 9">9</button>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<button title="page 10">10</button>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<span>...</span>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                            {{--<button title="last page - page 69">69</button>--}}
                            {{--</li>--}}
                            {{--<li><button class="next" title="next page">&#10095;</button></li>--}}
                        </ul>
                    </div>
                </div>

            @endif

        </div>
    </div>
    <div class="col-md-3">

        @include('_partials.geography')

        @include('_partials.news')

    </div>
@stop

@section('second-content')

    <div class="col-md-9">

        @include('_partials.product-new')

    </div>

    <div class="col-md-3">

        @include('_partials.facebook-page')

    </div>

@stop

@section('third-content')

    <div class="col-md-9">

        @include('_partials.review')

    </div>

    <div class="col-md-3">

        @include('_partials.product-previous')

    </div>

@stop