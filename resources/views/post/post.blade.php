@extends('layouts.main')
@section('title', 'Nainam - ลงประกาศ')
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
@stop

@section('source')

@stop

@section('script')
    <script src="{{ asset('resources/assets/jquery-ui/jquery-ui.min.js', env('HTTPS')) }}"></script>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/post.css', env('HTTPS')) }}"/>
    <script src="{{ asset('resources/assets/bootstrap/dist/js/bootstrap.js', env('HTTPS')) }}"></script>
@stop

@section('first-content')
    <div class="col-md-9">
        <h1 class="entry-title">ลงประกาศ </h1>


        <h2 class="entry-title text-center">เลือกลงประกาศที่คุณต้องการ</h2>

        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <a href="{{ route('post.product') }}" class="post-type-btn">
                    <div class="longshadows">
                        <div class="img-con">
                            <img src="{{ asset('resources/assets/images/post-product.png') }}">
                        </div>

                        <h2>ลงประกาศฟรี!</h2>
                    </div>
                </a>

                <div class="post-des">
                    <h2>ลงประกาศฟรี!</h2>
                    <ul>
                        <li>ประกาศ ขาย เช่า บ้าน, คอนโด, หอพัก, ที่ดินหรืออสังหาฯ อื่นๆ</li>
                        <li>แนะนำละเอียดให้ผู้อื่น</li>
                    </ul>
                    <span><a href="{{ route('post.product') }}">คลิกลงประกาศ</a></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <a href="{{ route('post.review') }}" class="post-type-btn">
                    <div class="longshadows">
                        <div class="img-con">
                            <img src="{{ asset('resources/assets/images/post-review.png') }}">
                        </div>
                        <h2>ลงประกาศโครงการ</h2>
                    </div>
                </a>

                <div class="post-des">
                    <h2>รีวิวโครงการ</h2>
                    <ul>
                        <li>รีวิวโครงการต่างๆ บ้าน คอนโดฯ อื่นๆ </li>
                        <li>ประกาศโครงการใหม่ สไตล์คุณ</li>
                        <li>สามารถลงเนื้อหาตามความเหมาะสม</li>
                    </ul>
                    <span><a href="{{ route('post.review') }}">คลิกรีวิว</a></span>
                </div>
            </div>
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