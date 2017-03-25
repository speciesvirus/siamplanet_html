@extends('layouts.app')

@section('style')

    <link rel="stylesheet" href="{{ asset('resources/assets/css/user/login.css', env('HTTPS')) }}" />

@endsection

@section('content')
    <div class="main-pattern"></div>
    <div class="page">

        <div class="container">
            <div class="div-login">
                <form name="login-form" class="login-form" method="POST" action="{{ route('user.login') }}">
                    {{ csrf_field() }}
                    <div class="header">
                        <h1 class="top-header">Login Form</h1>
                        <span>Fill out the form below to login to my super awesome imaginary control panel.</span>
                        <div class="login-social">
                            <div class="form-group">
                                <a class="enlace facebook" href="{{ route('social.redirect', 'facebook') }}">facebook</a>
                                <a class="enlace google" href="{{ route('social.redirect', 'google') }}">google</a>
                            </div>
                        </div>
                    </div>

                    <div class="content">
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1"><strong>Username</strong></label>
                            <input name="user" type="text" class="form-control username" placeholder="Username" value="{{ old('user') }}">
                            <span class="help-inline">{{ $errors->has('user') ? $errors->first('user') : '' }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
                            <label for="exampleInputEmail1"><strong>Password</strong></label>
                            <input name="pass" type="password" class="form-control password" placeholder="Password">
                            <span class="help-inline">{{ $errors->has('pass') ? $errors->first('pass') : '' }}</span>
                        </div>

                        @if(Session::has('alert-message'))

                            <div class="alert-message">
                                <span class="help-inline">{{Session::get('alert-message')}}</span>
                            </div>

                        @endif
                    </div>



                    <div class="form-group">
                        <button type="submit" class="proceed">Log-in to your account <i class="ion-ios-arrow-thin-right"></i></button>
                    </div>
                </form>

                <div class="side-content">
                    <h1>One account is all you need</h1>
                    <p>One free account gets you into everything Google.</p>
                </div>

            </div>

            <div class="div-join">

                <h1 class="top-header">Join</h1>

                <form id="girisyap" name="signup_form" method="post"  action="{{ route('join') }}">
                    {{ csrf_field() }}
                    <div>
                        <div class="col-md-6">
                            <div class="row" style="margin-right: -10px">
                                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                    <label for="exampleInputEmail1"><strong>Name</strong></label>
                                    <input name="first_name" type="text" class="form-control" placeholder="ชื่อ" value="{{ old('first_name') }}">
                                    <span class="help-inline">{{ $errors->has('first_name') ? $errors->first('first_name') : '' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row" style="margin-left: -10px">
                                <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                    <label for="exampleInputEmail1">&nbsp</label>
                                    <input name="last_name" type="text" class="form-control" placeholder="นามสกุล" value="{{ old('last_name') }}">
                                    <span class="help-inline">{{ $errors->has('last_name') ? $errors->first('last_name') : '' }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1"><strong>Your current email address</strong></label>
                        <input name="email" type="email" class="form-control" placeholder="อีเมล" value="{{ old('email') }}">
                        <span class="help-inline">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1"><strong>Choose your username</strong></label>
                        <input name="username" type="text" class="form-control" placeholder="ชื่อผู้ใช้" value="{{ old('username') }}">
                        <span class="help-inline">{{ $errors->has('username') ? $errors->first('username') : '' }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1"><strong>Create a password</strong></label>
                        <input name="password" type="password" class="form-control" placeholder="รหัสผ่าน">
                        <span class="help-inline">{{ $errors->has('password') ? $errors->first('password') : '' }}</span>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="exampleInputEmail1"><strong>Confirm your password</strong></label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="รหัสผ่านอีกครั้ง">
                        <span class="help-inline">{{ $errors->has('password_confirmation') ? $errors->first('password_confirmation') : '' }}</span>
                    </div>





                    <p class="agree">เมื่อคลิก สร้างบัญชีผู้ใช้ แสดงว่าคุณยินยอมตาม <a href="/legal/terms" id="terms-link" target="_blank" rel="nofollow">ข้อกำหนด</a>
                        และคุณได้อ่าน <a href="/about/privacy" id="privacy-link" target="_blank" rel="nofollow">นโยบายข้อมูล</a> ของเราแล้ว
                        รวมถึง <a href="/policies/cookies/" id="cookie-use-link" target="_blank" rel="nofollow">การใช้คุกกี้</a> </p>

                    <button type="submit" class="join-btn">Create an account </button>

                </form>
            </div>
        </div>
        {{--<section class="main">--}}
        {{----}}
        {{--<div class="content">--}}
        {{--<div class="container">--}}
        {{--<div class="info clearfix">--}}
        {{--<div class="picture">--}}
        {{--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample5.jpg">--}}
        {{--</div>--}}
        {{--<div class="content">--}}
        {{--<div class="title">Mark Brack</div>--}}
        {{--<div class="description">--}}
        {{--<div class="tags">--}}
        {{--<div class="tag orange"><span class="title">Email: </span> Chittapuu@gmail.com</div>--}}
        {{--<!--.tag.blue Clerk-->--}}
        {{--<div class="tag green"><span class="title">Phone: </span>0974146363</div>--}}
        {{--<!--.tag.red Inactive-->--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="message">--}}
        {{--<p>คณสามารถ <span class="un">ตั้งค่าข้อความ</span>สำหรับข้อมูลใช้มูลเพื่อแสดงผล <a href="#">คลิกที่นี่</a></p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</section>--}}

    </div>

@endsection
