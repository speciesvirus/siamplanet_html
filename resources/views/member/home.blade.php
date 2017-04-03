@extends('layouts.app')

@section('script')
    <script type="text/javascript">

        $(function () {

            var $t_phone = '',
                $t_message = '';
            $(document).on('click', '.fa-pencil-square-o.edit-phone', function () {
                var $this = $(this),
                    $edit = $this.parent().find('.edit');
                $t_phone = $edit.html();
                $edit.html('<input type="text" class="text-edit-phone" value="'+$t_phone+'" />');
                $this.removeClass('fa-pencil-square-o').addClass('fa-check');
                $('.text-edit-phone').focus();
            });

            var $keyup = false;
            $(document).on('keyup', '.text-edit-phone', function (event) {
                var $this = $(this),
                    $edit = $this.parent().parent().find('.edit'),
                    $val = $this.val();

                if(event.keyCode == 13){
                    $keyup = true;

                    if (confirm("คุณต้องการเปลี่ยนแปลงหรือไม่!")) {

                        $.ajax({
                            url     : "{{ route('update.phone') }}",
                            type    : 'post',
                            data : {
                                phone : $val
                            },
                            dataType: "json",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success : function ( json )
                            {
                                console.log('result : ', json);
                                $edit.html($val);
                            },
                            error   : function ( jqXhr, json, errorThrown )
                            {
                                var errors = jqXhr.responseJSON;
                                console.log(errors);
                                $edit.html($t_phone);
                            }
                        });

                    } else {
                        $edit.html($t_phone);
                    }

                    var $e = $('.edit-phone');
                    $e.removeClass('fa-check').addClass('fa-pencil-square-o');

                }
            });

            $(document).on('blur', '.text-edit-phone', function (event) {
                var $this = $(this),
                    $edit = $this.parent().parent().find('.edit'),
                    $val = $this.val();

                if(!$keyup){
                    if (confirm("คุณต้องการเปลี่ยนแปลงหรือไม่!")) {

                        $.ajax({
                            url     : "{{ route('update.phone') }}",
                            type    : 'post',
                            data : {
                                phone : $val
                            },
                            dataType: "json",
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success : function ( json )
                            {
                                console.log('result : ', json);
                                $edit.html($val);
                            },
                            error   : function ( jqXhr, json, errorThrown )
                            {
                                var errors = jqXhr.responseJSON;
                                console.log(errors);
                                $edit.html($t_phone);
                            }
                        });

                    } else {
                        $edit.html($t_phone);
                    }

                    var $e = $('.edit-phone');
                    $e.removeClass('fa-check').addClass('fa-pencil-square-o');
                }

            });

            $(document).on('click', '.fa-pencil-square-o.edit-message', function () {
                var $this = $(this),
                    $edit = $this.parent().find('.edit');
                $t_message = $edit.html();
                $edit.html('<textarea class="text-edit-message" rows="4" cols="50">'+$t_message+'</textarea>');
                $this.removeClass('fa-pencil-square-o').addClass('fa-check');
                $('.text-edit-message').focus();
            });

            $(document).on('blur', '.text-edit-message', function (e) {
                var $this = $(this),
                    $edit = $this.parent().parent().find('.edit'),
                    $val = $this.val();

                if (confirm("คุณต้องการเปลี่ยนแปลงหรือไม่!")) {

                    $.ajax({
                        url     : "{{ route('update.message') }}",
                        type    : 'post',
                        data : {
                            message : $val
                        },
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success : function ( json )
                        {
                            console.log('result : ', json);
                            $edit.html($val);
                        },
                        error   : function ( jqXhr, json, errorThrown )
                        {
                            var errors = jqXhr.responseJSON;
                            console.log(errors);
                            $edit.html($t_phone);
                        }
                    });


                } else {
                    $edit.html($t_message);
                }

                var $e = $('.edit-message');
                $e.removeClass('fa-check').addClass('fa-pencil-square-o');

            });



            $('ul.your-post li a').click(function () {
                var $this = $(this),
                    $id = $this.data('id');

                $this.parent().parent().find('span').removeClass('active');
                $this.children().addClass('active');
                $.ajax({
                    url     : "{{ route('show.message') }}",
                    type    : 'post',
                    data : {
                        messageId : $id
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success : function ( json )
                    {
                        console.log('result : ', json);
                        $('.u_p_id').html($id);
                        $('.u_p_title').html($this.find('span').html());

                        $('.message-action').data('id', $id);

                        var $html = '';
                        console.log(json.message);
                        $.each( json.message, function( key, value ) {
                            console.log(key);
                            $html += '<div class="message"><div class="head">'+
                                '<h2 class="message-from">ข้อความจาก <span> - '+value.first_name+' '+value.last_name+'</span></h2>'+
                                '<span class="on">'+value.email+', '+value.phone+' on <span>'+value.created_at+'</span></span>'+
                                '</div>'+
                                '<p>'+value.message+'</p></div>';
                        });

                        $('.page-box .message-div').html($html);

                        $('.page-content').removeClass('hidden');
                        $('.page-delete').addClass('hidden');
                    },
                    error   : function ( jqXhr, json, errorThrown )
                    {
                        var errors = jqXhr.responseJSON;
                        console.log(errors);
                    }
                });
            });


            $('.p-delete').click(function () {
                var $this = $(this),
                    $id = $this.parent().parent().data('id');

                $('.page-content').addClass('hidden');
                $('.page-delete').removeClass('hidden');
            });

            $('.p-sold').click(function () {
                var $this = $(this),
                    $id = $this.parent().parent().data('id');

                if (confirm("คุณต้องการแจ้งหรือไม่!")) {
                    $.ajax({
                        url     : "{{ route('update.product') }}",
                        type    : 'post',
                        data : {
                            productId : $id,
                            status : 'S'
                        },
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success : function ( json )
                        {
                            alert(json.result);
                        },
                        error   : function ( jqXhr, json, errorThrown )
                        {
                            var errors = jqXhr.responseJSON;
                            console.log(errors);
                        }
                    });
                }

            });


            $('#p-delete-form').submit(function (e) {
                e.preventDefault();

                var $this = $(this),
                    $id = $('.message-action').data('id');

                $.ajax({
                    url     : "{{ route('update.product') }}",
                    type    : 'post',
                    data : {
                        productId : $id,
                        status : $('select[name="delete_title"]').val()
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success : function ( json )
                    {
                        alert(json.result);

                        $('.page-content').removeClass('hidden');
                        $('.page-delete').addClass('hidden');
                    },
                    error   : function ( jqXhr, json, errorThrown )
                    {
                        var errors = jqXhr.responseJSON;
                        console.log(errors);
                    }
                });

            });


            $('._156p').click(function () {
                $('#file-avatar').click();
            });

            $('#file-avatar').change(function () {
                var $this = $(this);
                if($this.val() != ''){
//console.log($this[0].files[0]);
                    var data = new FormData();
                    data.append(0, $this[0].files[0]);

                    $.ajax({
                        url     : "{{ route('update.avatar') }}",
                        type    : 'post',
                        data : data,
                        cache: false,
                        dataType: 'json',
                        processData: false, // Don't process the files
                        contentType: false, // Set content type to false as jQuery will
                        headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success : function ( json )
                        {
                            console.log(json);
                            location.reload();
                        },
                        error   : function ( jqXhr, json, errorThrown )
                        {
                            console.log(jqXhr);
                        }
                    });
                }
            });

        });

    </script>
@stop

@section('content')

    <div class="page">

        <section class="main">
            <div class="main-pattern"></div>
            <div class="content">
                <div class="container">
                    <div class="info clearfix">
                        <div class="picture">
                            <img src="{!! str_replace('https:', 'http:', $user_avatar) !!}">
                            <div class="fbTimelineProfilePicSelector _23fv">
                                <div class="_156n _23fw" data-ft="{&quot;tn&quot;:&quot;+B&quot;}">
                                    <a class="_156p" href="#" rel="dialog" role="button" id="u_jsonp_2_9">
                                        <i class="fa fa-camera" aria-hidden="true"></i>
                                        Update Profile Picture</a>
                                </div>
                            </div>
                            <input type="file" id="file-avatar" class="hidden">
                        </div>
                        <div class="content">
                            <div class="title">{{ $user->first_name }} {{ $user->last_name }}</div>
                            <div class="description">
                                <div class="tags">
                                    <div class="tag orange"><span class="title">Email: </span> {{ $user->email }}</div>
                                    <!--.tag.blue Clerk-->
                                    <div class="tag green"><span class="title">Phone: </span><span class="edit">{{ $user_contact != null ? $user_contact->phone : '' }}</span> <i class="fa fa-pencil-square-o edit-phone" aria-hidden="true"></i></div>
                                    <!--.tag.red Inactive-->
                                </div>
                            </div>
                            <div class="message">
                                <p><span class="edit">{!! $user_contact != null && $user_contact->message != null ? $user_contact->message : 'คณสามารถ <span class="un">ตั้งค่าข้อความ</span>สำหรับข้อมูลใช้มูลเพื่อแสดงผล <a href="#">คลิกที่นี่</a></span>' !!}</span> <i class="fa fa-pencil-square-o edit-message" aria-hidden="true"></i></p>
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
                        @if(!$user_product->isEmpty())
                            <div class="page-box text-right message-action" data-id="{{ $user_product[0]->id }}">
                                <span><a href="javascript://" class="p-delete">แจ้งลบประกาศ</a></span>,
                                <span><a href="javascript://" class="p-sold">ประกาศขายแล้ว</a></span>
                            </div>
                        @endif
                        <div class="page-box page-content">
                            <div class="title">
                                <h1>ข้อความ</h1>
                                <p>ข้อความจากผู้อ่านประกาศ</p>
                            </div>

                            @if(!$user_product->isEmpty())
                                <h2>หมายเลขประกาศ : <span class="u_p_id">{{ $user_product[0]->id }}</span><br>
                                    <span class="u_p_title">{{ $user_product[0]->title }}</span>
                                </h2>

                                <hr>

                                <div class="message-div">
                                    @if($product_message)
                                        @foreach($product_message as $value)
                                            <div class="message">
                                                <div class="head">
                                                    <h2 class="message-from">ข้อความจาก <span> - {{ $value->first_name }} {{ $value->last_name }}</span></h2>
                                                    <span class="on">{{ $value->email }}, {{ $value->phone }} on <span>{{ $value->created_at }}</span></span>
                                                </div>
                                                <p>{{ $value->message }}</p>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            @endif

                        </div>

                            @if(!$user_product->isEmpty())
                                <div class="page-box page-delete hidden">
                                    <div class="title">
                                        <h1>แจ้งลบประกาศ</h1>
                                        <p>ทางระบบจะตรวจสอบข้อมูลอีกครั้งหลังจากที่ท่านแจ้งเข้ามา</p>
                                    </div>

                                    <h2>หมายเลขประกาศ : <span class="u_p_id">{{ $user_product[0]->id }}</span><br>
                                        <span class="u_p_title">{{ $user_product[0]->title }}</span>
                                    </h2>

                                    <hr>

                                    <div class="delete-div">
                                        <form id="p-delete-form">
                                            <div class="form-horizontal">
                                                <h3 class="side-list-title">เลือกหัวข้อที่ท่านต้องการลบประกาศ</h3>

                                                <!-- Text input -->
                                                <div class="form-group">
                                                    <label class="col-xs-6 col-sm-3 control-label required" for="delete_title">หัวข้อ</label>
                                                    <div class="col-md-5">
                                                        <select name="delete_title" title="หัวข้อ" class="btn btn-default select-btn">
                                                            <option value="F">ข้อความประกาศไม่ถูกต้อง</option>
                                                            <option value="T">ประกาศผิดประเภท</option>
                                                            <option value="O">อื่นๆ</option>
                                                        </select>
                                                    </div>

                                                </div>

                                                <!-- Text input -->
                                                <div class="form-group">
                                                    <label class="col-xs-6 col-sm-3 control-label" for="delete_subtitle"></label>
                                                    <div class="col-md-5">
                                                        <input type="submit" class="btn btn-primary" value="แจ้งประกาศ">
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>

                                </div>
                            @endif

                    </div>
                    <div class="col-md-4">
                        <div class="page-box">
                            <div class="title">
                                <h1>ประกาศ</h1>
                                <p>รายการประกาศของคุณทั้งหมด</p>
                                <span>( เลือกประกาศด้านล่างเพื่อแสดงข้อความการติดต่อระหว่างคุณ )</span>
                            </div>

                            <ul class="your-post">
                                @foreach($user_product as $key => $value)
                                    <li><a href="#" data-id="{{ $value->id }}">{{ $value->id }} : <span class="tt {{ $key == 0 ? 'active' : '' }}">{{ $value->title }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection
