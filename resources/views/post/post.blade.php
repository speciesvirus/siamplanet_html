@extends('layouts.main')
@section('title', 'Siam Planet')
@section('meta')

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
                        <li>ต้องการประกาศขายหรือเช่า</li>
                        <li>บอกรายละเอียดให้ผู้อื่น</li>
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
                    <h2>ลงประกาศโครงการ</h2>
                    <ul>
                        <li>ต้องการประกาศขายหรือเช่า</li>
                        <li>บอกรายละเอียดให้ผู้อื่น</li>
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