@extends('layouts.app')

@section('content')

    <div class="page">

        <section class="main">
            <div class="main-pattern"></div>
            <div class="content">
                <div class="container">
                    <div class="info clearfix">
                        <div class="picture">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample5.jpg">
                            <div class="fbTimelineProfilePicSelector _23fv">
                                <div class="_156n _23fw" data-ft="{&quot;tn&quot;:&quot;+B&quot;}">
                                    <a class="_156p" href="#" ajaxify="/profile/picture/menu_dialog/?context_id=u_jsonp_2_6&amp;profile_id=100001573223278" rel="dialog" role="button" id="u_jsonp_2_9">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        Update Profile Picture</a>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="title">{{ $user->first_name }} {{ $user->last_name }}</div>
                            <div class="description">
                                <div class="tags">
                                    <div class="tag orange"><span class="title">Email: </span> {{ $user->email }}</div>
                                    <!--.tag.blue Clerk-->
                                    <div class="tag green"><span class="title">Phone: </span>0974146363 <i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
                                    <!--.tag.red Inactive-->
                                </div>
                            </div>
                            <div class="message">
                                <p>คณสามารถ <span class="un">ตั้งค่าข้อความ</span>สำหรับข้อมูลใช้มูลเพื่อแสดงผล <a href="#">คลิกที่นี่</a> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="page-below">
            <div class="container">
                <div class="">
                    <div class="col-md-8">
                        <div class="page-box text-right">
                            <span><a href="#">แจ้งลบประกาศ</a></span>,
                            <span><a href="#">ประกาศขายแล้ว</a></span>
                        </div>
                        <div class="page-box">
                            <div class="title">
                                <h1>ข้อความ</h1>
                                <p>ข้อความจากผู้อ่านประกาศ</p>
                            </div>

                            <h2>หมายเลขประกาศ : {{ $user_product[0]->id }} <br>
                                {{ $user_product[0]->title }}
                            </h2>

                            <hr>
                            @foreach($product_message as $value)
                                <div class="message">
                                    <div class="head">
                                        <h2 class="message-from">ข้อความจาก - {{ $value->first_name }} {{ $value->last_name }}</h2>
                                        <span class="on">{{ $value->email }}, {{ $value->phone }} on <span>{{ $value->created_at }}</span></span>
                                    </div>
                                    <p>{{ $value->message }}</p>
                                </div>
                            @endforeach


                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="page-box">
                            <div class="title">
                                <h1>ประกาศ</h1>
                                <p>รายการประกาศของคุณทั้งหมด</p>
                                <span>( เลือกประกาศด้านล่างเพื่อแสดงข้อความการติดต่อระหว่างคุณ )</span>
                            </div>

                            <ul class="your-post">
                                @foreach($user_product as $value)
                                    <li><a href="#">{{ $value->id }}: {{ $value->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection
