@extends('layouts.main')
@section('title', 'Siam Planet')
@section('meta')

@stop

@section('source')

@stop

@section('script')
    <!--<script src="{{ asset('/resources/assets/slick-carousel/slick/slick.min.js') }}"></script>-->
    <script src="resources/assets/jquery-ui/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="resources/assets/css/post.css"/>

    <script src="resources/assets/bootstrap/dist/js/bootstrap.js"></script>

    <script src="resources/assets/tinymce/tinymce.jquery.min.js"></script>

    <script src="resources/assets/select2/dist/js/select2.full.js"></script>

    <script type="text/javascript">
        //$('#edit').froalaEditor();
        tinymce.init({
            selector: '#edit',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_css: '//www.tinymce.com/css/codepen.min.css'
        });
        //        $('div#froala-editor').froalaEditor('html.get');

        // File Upload
        //
        var arrImage = [];
        function ekUpload() {
            function Init() {

                console.log("Upload Initialised");

                var fileSelect = document.getElementById('file-upload'),
                    fileDrag = document.getElementById('file-drag'),
                    submitButton = document.getElementById('submit-button');

                fileSelect.addEventListener('change', fileSelectHandler, false);

                // Is XHR2 available?
                var xhr = new XMLHttpRequest();
                if (xhr.upload) {
                    // File Drop
                    fileDrag.addEventListener('dragover', fileDragHover, false);
                    fileDrag.addEventListener('dragleave', fileDragHover, false);
                    fileDrag.addEventListener('drop', fileSelectHandler, false);
                }
            }

            function fileDragHover(e) {
                var fileDrag = document.getElementById('file-drag');

                e.stopPropagation();
                e.preventDefault();

                fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
            }

            function fileSelectHandler(e) {
                // Fetch FileList object
                var files = e.target.files || e.dataTransfer.files;

                // Cancel event and hover styling
                fileDragHover(e);

                // Process all File objects
                for (var i = 0, f; f = files[i]; i++) {
                    parseFile(f);
                    uploadFile(f);
                }
            }

            // Output
            // function output(msg) {
            //     // Response
            //     var m = document.getElementById('messages');
            //     m.innerHTML = msg;
            // }

            function parseFile(file) {

                console.log(file.name);
                // output(
                //     '<strong>' + encodeURI(file.name) + '</strong>'
                // );

                // var fileType = file.type;
                // console.log(fileType);
                var imageName = file.name;

                var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
                if (isGood) {
                    var srcImage = URL.createObjectURL(file);
                    // scrImage = encodeURI(file.name);
                    // document.getElementById('start').classList.add("hidden");
                    // document.getElementById('response').classList.remove("hidden");
                    // document.getElementById('notimage').classList.add("hidden");
                    // Thumbnail Preview
                    // document.getElementById('file-image').classList.remove("hidden");
                    // document.getElementById('file-image').src = srcImage;
                    $('#group_items_panel').append('<div class="item_box"><a href="#delete" class="delete"></a><img src="' + srcImage + '"></div>');
                    arrImage.push(srcImage);
                }
                else {
                    // document.getElementById('file-image').classList.add("hidden");
                    // document.getElementById('notimage').classList.remove("hidden");
                    // document.getElementById('start').classList.remove("hidden");
                    // document.getElementById('response').classList.add("hidden");
                    alert('ไฟล์ภาพไม่ถูกต้อง');
                    document.getElementById("file-upload-form").reset();
                }
            }

            // function setProgressMaxValue(e) {
            //     var pBar = document.getElementById('file-progress');

            //     if (e.lengthComputable) {
            //         pBar.max = e.total;
            //     }
            // }

            // function updateFileProgress(e) {
            //     var pBar = document.getElementById('file-progress');

            //     if (e.lengthComputable) {
            //         pBar.value = e.loaded;
            //     }
            // }

            function uploadFile(file) {

                var xhr = new XMLHttpRequest(),
                    // pBar = document.getElementById('file-progress'),
                    fileSizeLimit = 1024; // In MB
                if (xhr.upload) {
                    // Check if file is less than x MB
                    if (file.size <= fileSizeLimit * 1024 * 1024) {
                        // Progress bar
                        // pBar.style.display = 'inline';
                        // xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                        // xhr.upload.addEventListener('progress', updateFileProgress, false);

                        // File received / failed
                        xhr.onreadystatechange = function (e) {
                            if (xhr.readyState == 4) {
                                // Everything is good!

                                // progress.className = (xhr.status == 200 ? "success" : "failure");
                                // document.location.reload(true);
                            }
                        };

                        // Start upload
                        // xhr.open('POST', document.getElementById('file-upload-form').action, true);
                        // xhr.setRequestHeader('X-File-Name', file.name);
                        // xhr.setRequestHeader('X-File-Size', file.size);
                        // xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                        // xhr.send(file);
                    } else {
                        output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                    }
                }
            }

            // Check for the various File API support.
            if (window.File && window.FileList && window.FileReader) {
                Init();
            } else {
                document.getElementById('file-drag').style.display = 'none';
            }
        }
        ekUpload();
        $("#group_items_panel").sortable();
        $("#group_items_panel").disableSelection();

        // $(document).on('click','.item_box', function(){

        //   var f = $(this).find('img').attr('src');
        //   $.each(arrImage, function( index, value ) {
        //       if(f === value){
        //          alert( index + ": " + value );
        //       }

        //     });
        // });
        $(document).on('click', '.item_box a.delete', function () {
            var $this = $(this),
                r = confirm("Press a button!");

            if (r == true) {
                var f = $this.next().attr('src');
                $this.parent().remove();
                $.each(arrImage, function (index, value) {
                    if (f === value) {
                        arrImage.splice(index, 1);
                    }
                });

            }
        });





        var $eventLog = $(".js-event-log");
        var $eventSelect = $("#id_label_multiple");

        $eventSelect.select2({
            placeholder: "Select a state"
        });
//        $eventSelect.on("select2:open", function (e) { log("select2:open", e); });
//        $eventSelect.on("select2:close", function (e) { log("select2:close", e); });
        $eventSelect.on("select2:select", function (e) {
            //log("select2:select", e);
            var model = tagFacility("select2:select", e);
//            console.log('sss', model.name);
            var $div = $('.fc-c');

            var $html = '<div class="fc-d" data-fc="'+ model.id +'"><label class="col-xs-6 col-sm-3 control-label">'+ model.name +'</label>'+
                '<div class="fc-input">'+
                '<input type="file" class="form-control form-input form-style-base">'+
                '<input type="text" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly>'+
                '<span class="glyphicon glyphicon-open input-place"></span>'+
                '</div></div>';
            $div.append($html);


        });
        $eventSelect.on("select2:unselect", function (e) {
            //log("select2:unselect", e);
            var model = tagFacility("select2:select", e);
            $(".fc-d").each(function() {
                var $this = $(this);
                if($this.data('fc') == model.id){
                    $this.remove();
                }
            });

        });

        $eventSelect.on("change", function (e) { log("change"); });

        function log (name, evt) {
            if (!evt) {
                var args = "{}";
            } else {
                var args = JSON.stringify(evt.params, function (key, value) {
                    if (value && value.nodeName) return "[DOM node]";
                    if (value instanceof $.Event) return "[$.Event]";
                    return value;
                });
            }
            var $e = $("<li>" + name + " -> " + args + "</li>");
            $eventLog.append($e);
            //alert("Selected value is: "+$eventSelect.select2("val"));
//            $e.animate({ opacity: 1 }, 10000, 'linear', function () {
//                $e.animate({ opacity: 0 }, 2000, 'linear', function () {
//                    $e.remove();
//                });
//            });
        }

        function tagFacility(name, evt) {
            var model = new $facility();
              if (!evt) {
                var args = "{}";
              } else {
                var args = JSON.stringify(evt.params, function (key, value) {
                  if (value && value.nodeName) return "[DOM node]";
                  if (value instanceof $.Event) return "[$.Event]";
                  return value;
                });
              }

              var json = JSON.parse(args)
                model.name = json.data.text;
                model.id = json.data.id;

                    // if (value && value.nodeName){
                    //     console.log('dfsfs', value.data.text);
                    //     model.name = value.text;

                    //     return model;
                    // }

                    //return value;
            return model;
        }
        var $facility = function () {
            id : ''
            name : ''
        };
        //form-style-fake
        $(document).on('change', '.form-style-base', function (e) {
            var files = e.target.files || e.dataTransfer.files;
            var $this = $(this);
            for (var i = 0, f; f = files[i]; i++) {
                $this.next().val(f.name);
            }
        });







    </script>






    <!--<link rel="stylesheet prefetch" href="//api.tiles.mapbox.com/mapbox.js/v1.4.0/mapbox.css">-->
    <!--<script src="//api.tiles.mapbox.com/mapbox.js/v1.5.2/mapbox.js"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGFbK0CvMXKVzCJA_2Fj5B7pItfK0a1QA"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<script type="text/javascript">

   var markers = [];
    var uniqueId = 2;

        var allMyMarkers = [];
        var is_internetExplorer11 = navigator.userAgent.toLowerCase().indexOf('trident') > -1;
        var $marker_url = ( is_internetExplorer11 ) ? 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png' : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location_1.svg';
            var image = {
                url: $marker_url,
                // This marker is 20 pixels wide by 32 pixels high.
                scaledSize: new google.maps.Size(20, 20)
            };

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 9,
          center: {lat: 14.050942, lng: 100.753091 }
        });

        map.addListener('click', function(e) {

            var $point = $('#select-point').val();
            if($point == 1){
                for (var i = 0; i < markers.length; i++) {
                    if (markers[i].id == 1) {
                        //Remove the marker from Map
                        markers[i].setMap(null);

                        //Remove the marker from array.
                        markers.splice(i, 1);
                    }
                }
                image.url = ( is_internetExplorer11 ) ? 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png' : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location_1.svg';
                placeMarkerAndPanTo(e.latLng, map, 1);
            }else{
                image.url = "http://www.freeiconspng.com/uploads/red-location-icon-map-png-4.png"
                placeMarkerAndPanTo(e.latLng, map, uniqueId);
                uniqueId++;
            }



        });
      function placeMarkerAndPanTo(latLng, map, key) {
        // var marker = new google.maps.Marker({
        //   position: latLng,
        //   map: map,
        //   icon: image,
        // });

        //Determine the location where the user has clicked.
            var location = latLng;

            //Create a marker and placed it on the map.
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                icon: image
            });

            //Set unique id
            marker.id = key;


            //Attach click event handler to the marker.
            google.maps.event.addListener(marker, "click", function (e) {
                var content = 'Latitude: ' + location.lat() + '<br />Longitude: ' + location.lng();
                content += "<br /><input type = 'button' value = 'Delete' onclick = 'DeleteMarker(" + marker.id + ");' value = 'Delete' />";
                var infoWindow = new google.maps.InfoWindow({
                    content: content
                });
                infoWindow.open(map, marker);
            });

            //Add marker to the array.
            markers.push(marker);
            //map.panTo(latLng);
      }



       function DeleteMarker(id) {
        //Find and remove the marker from the Array
        for (var i = 0; i < markers.length; i++) {
            if (markers[i].id == id) {
                //Remove the marker from Map
                markers[i].setMap(null);

                //Remove the marker from array.
                markers.splice(i, 1);
                return;
            }
        }
    };

    </script>
@stop

@section('first-content')
    <div class="col-md-9">
        <h1 class="entry-title">ลงประกาศ </h1>

        <div class="section">


            <div class="form-horizontal">
                <h3 class="side-list-title">ข้อมูลหลัก</h3>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">หัวข้อ</label>
                    <div class="col-md-5">
                        <input name="status" class="form-control input-md" id="status" type="text" placeholder="Topic">
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">อธิบายหัวข้อ</label>
                    <div class="col-md-5">
                        <input name="status" class="form-control input-md" id="status" type="text"
                               placeholder="Content">
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">ประเภท</label>
                    <div class="col-md-5">
                        <input name="status" class="form-control input-md" id="status" type="text"
                               placeholder="Content">
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">ความต้องการ</label>
                    <div class="col-md-5">
                        <input name="status" class="form-control input-md" id="status" type="text"
                               placeholder="Content">
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">ขนาดพื้นที่</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control input-md" placeholder="Content">
                            <span class="input-group-btn">
                    				<select name="txt_ingredient" title="Measure" class="btn btn-default select-btn">
                    							<option value="barra">ตารางเมตร (sq.m.)</option>
                    							<option value="cucharada café">ตารางวา (sq.w.)</option>
                    							<option value="cucharada sopera">c/s cucharada sopera</option>
                    				</select>
                    			</span>
                        </div>
                    </div>
                </div>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">ราคา</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" class="form-control input-md" placeholder="Content">
                            <span class="input-group-addon" id="basic-addon2">บาท</span>
                        </div>
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">ชื่อโครงการ</label>
                    <div class="col-md-5">
                        <input name="status" class="form-control input-md" id="status" type="text"
                               placeholder="Content">
                    </div>
                </div>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">ปี่ที่สร้างเสร็จ</label>
                    <div class="col-md-5">
                        <input name="status" class="form-control input-md" id="status" type="text"
                               placeholder="Content">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="documentid">ภาพ</label>
                    <div class="col-md-4">

                        <div id="group_items_panel" class="ui-sortable">
                            <!--<div class="item_box">-->
                            <!--    <a href="#delete" class="delete"></a>-->
                            <!--    <img src="http://www.mvpthemes.com/flexmag/wp-content/uploads/2015/09/woman-beach2.jpg">-->

                            <!--</div>-->
                        </div>

                        <form id="file-upload-form" class="uploader">
                            <input id="file-upload" type="file" name="fileUpload" accept="image/*"/>

                            <label for="file-upload" id="file-drag">
                                {{--<img id="file-image" src="#" alt="Preview" class="hidden">--}}
                                <div id="start">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Select a file or drag here</div>
                                    <div id="notimage" class="hidden">Please select an image</div>
                                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                </div>
                                <!--<div id="response" class="hidden">-->
                                <!--    <div id="messages"></div>-->
                                <!--    <progress class="progress" id="file-progress" value="0">-->
                                <!--        <span>0</span>%-->
                                <!--    </progress>-->
                                <!--</div>-->
                            </label>
                        </form>
                    </div>
                </div>

            </div>

            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <h3 class="side-list-title">Review</h3>

                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="documentid">ช้อความ</label>
                        <div class="col-md-4">
                            <!--<textarea id="edit" name="content"></textarea>-->

                            <textarea id="edit" name="content">
                              <p style="text-align: center;">
                                <img title="TinyMCE Logo" src="//www.tinymce.com/images/glyph-tinymce@2x.png"
                                     alt="TinyMCE Logo" width="110" height="97"/>
                              </p>

                              <h1 style="text-align: center;">Welcome to the TinyMCE editor demo!</h1>

                              <p>
                                Please try out the features provided in this basic example.<br>
                                Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering – the demo is to show the integration.
                              </p>

                              <h2>Got questions or need help?</h2>

                              <ul>
                                <li>Our <a href="http://www.tinymce.com/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>
                                <li>Have a specific question? Visit the <a href="http://community.tinymce.com/forum/"
                                                                           target="_blank">Community Forum</a>.</li>
                                <li>We also offer enterprise grade support as part of <a href="www.tinymce.com/pricing">TinyMCE Enterprise</a>.</li>
                              </ul>

                              <h2>A simple table to play with</h2>

                              <table style="text-align: center;">
                                <thead>
                                  <tr>
                                    <th>Product</th>
                                    <th>Cost</th>
                                    <th>Really?</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>TinyMCE</td>
                                    <td>Free</td>
                                    <td>YES!</td>
                                  </tr>
                                  <tr>
                                    <td>Plupload</td>
                                    <td>Free</td>
                                    <td>YES!</td>
                                  </tr>
                                </tbody>
                              </table>

                              <h2>Found a bug?</h2>

                              <p>
                                If you think you have found a bug please create an issue on the <a
                                          href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.
                              </p>

                              <h2>Finally ...</h2>

                              <p>
                                Don't forget to check out our other product <a href="http://www.plupload.com"
                                                                               target="_blank">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.
                              </p>
                              <p>
                                Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br>All the best from the TinyMCE team.
                              </p>
                            </textarea>


                        </div>
                    </div>


                </fieldset>
            </form>

            <div class="form-horizontal">
                <h3 class="side-list-title">ข้อมูลเพิ่มเติม</h3>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">สิ่งอำนวยความสะดวก</label>
                    <div class="col-md-4">

                        <select class="js-example-placeholder-multiple js-states form-control select2-hidden-accessible" id="id_label_multiple" multiple="multiple" tabindex="-1" aria-hidden="true">
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </optgroup>
                            <optgroup label="Central Time Zone">
                                <option value="AL">Alabama</option>
                                <option value="AR">Arkansas</option>
                                <option value="IL">Illinois</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="OK">Oklahoma</option>
                                <option value="SD">South Dakota</option>
                                <option value="TX">Texas</option>
                                <option value="TN">Tennessee</option>
                                <option value="WI">Wisconsin</option>
                            </optgroup>
                            <optgroup label="Eastern Time Zone">
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="IN">Indiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="OH">Ohio</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WV">West Virginia</option>
                            </optgroup>
                        </select>

                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                    <div class="col-md-4 fc-c">
                        <!--<div class="fc-d">-->
                        <!--    <label class="col-xs-6 col-sm-3 control-label">adadad</label>-->
                        <!--    <div class="fc-input">-->
                        <!--        <input type="file" class="form-control form-input form-style-base">-->
                        <!--        <input type="text" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly>-->
                        <!--        <span class="glyphicon glyphicon-open input-place"></span>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                </div>


            </div>


            <div class="form-horizontal">
                <h3 class="side-list-title">แผนที่</h3>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status">พื่นที่โครงการ</label>
                    <div class="col-md-5">
                        <select class="form-control" id="select-point">
                          <option value="1">1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                </div>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                    <div class="col-md-4">
                        <div class="google-maps-res">
                            <div id="map" class="google-maps"></div>
                        </div>
                    </div>
                </div>



                <div class="form-horizontal">
                    <h3 class="side-list-title">Keyword</h3>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="status">Tag</label>
                        <div class="col-md-5">
                            <input name="status" class="form-control input-md" id="status" type="text" placeholder="Topic">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                        <div class="col-md-5">
                            <input name="status" class="form-control input-md" id="status" type="text"
                                   placeholder="Content">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                        <div class="col-md-5">
                            <input name="status" class="form-control input-md" id="status" type="text"
                                   placeholder="Content">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                        <div class="col-md-5">
                            <input name="status" class="form-control input-md" id="status" type="text"
                                   placeholder="Content">
                        </div>
                    </div>





                </div>


                <div class="form-horizontal">
                    <h3 class="side-list-title"></h3>
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                        <div class="col-md-5">
                            <a href="#" class="btn btn-primary" role="button">ลงประกาศ</a>
                            &nbsp
                            <a href="#" class="btn btn-default" role="button">ยกเลิกข้อมูล</a>
                        </div>
                    </div>


                </div>

            </div>

        </div>


        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1724713611112155";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    </div>

    <div class="col-md-3">

        <div class="side-panel bs-docs-sidebar">
            <div class="topic">
                <span>New Posts</span>
            </div>
            <ul class="bullet-list-round">
                <li>
                    ที่ดิน
                    <ul class="bullet-list-round open">
                        <li>
                            ภาคกลาง
                            <ul class="bullet-list-round open">
                                <li>
                                    <a href="#">กรุงเทพมหานคร</a> (15)
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    ที่ดิน
                    <ul class="bullet-list-round open">
                        <li>
                            ภาคกลาง
                            <ul class="bullet-list-round open">
                                <li>
                                    <a href="#">กรุงเทพมหานคร</a> (15)
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="sidebar-widget">

            <aside id="new_entries-2" class="widget widget_new_entries">
                <h3 class="side-list-title">News</h3>
                <ul class="new-entrys">
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/simplicity2-4-1/" class="new-entry-image"
                               title="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/simplicity2-4-1/" class="new-entry-title"
                               title="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。">Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/simplicity2-4/" class="new-entry-image"
                               title="Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/simplicity2-4/" class="new-entry-title"
                               title="Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。">Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/simplicity2-4-0h/" class="new-entry-image"
                               title="Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/simplicity2-4-0h/" class="new-entry-title"
                               title="Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。">Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/no-amp-page-settings/" class="new-entry-image"
                               title="Simplicityで個別にAMPページを生成しないようにする設定方法"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicityで個別にAMPページを生成しないようにする設定方法"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/no-amp-page-settings/" class="new-entry-title"
                               title="Simplicityで個別にAMPページを生成しないようにする設定方法">Simplicityで個別にAMPページを生成しないようにする設定方法</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/comment-external-blog-caard/" class="new-entry-image"
                               title="Simplicityのコメント欄で利用できる外部ブログカード機能について"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicityのコメント欄で利用できる外部ブログカード機能について"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/comment-external-blog-caard/" class="new-entry-title"
                               title="Simplicityのコメント欄で利用できる外部ブログカード機能について">Simplicityのコメント欄で利用できる外部ブログカード機能について</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                </ul>
                <div class="clear"></div>
            </aside>

        </div>

    </div>
@stop

@section('second-content')

    <div class="col-md-9">
        <div class="list-container">
            <h2>ประกาศล่าสุด</h2>
            <ul class="list">
                <li>
                    <span class="list-badge"><a href="#">คอนโด</a></span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">บ้าน</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">ที่ดิน</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">คอนโด</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">คอนโด</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">คอนโด</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>

            </ul>
        </div>
    </div>

    <div class="col-md-3">
        <div class="sidebar-widget">
            <div class="fb-page" data-href="https://www.facebook.com/unbokofficial/" data-tabs="timeline"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/unbokofficial/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/unbokofficial/">Unbok</a></blockquote>
            </div>
        </div>
    </div>

@stop



@section('third-content')

    <div class="col-md-9">
        <h3 class="side-list-title">Review</h3>
        <aside id="related-entries">
            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/"
                       title="SimplicityとWordPress Popular Postsを関連づける方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="SimplicityとWordPress Popular Postsを関連づける方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/"
                               class="related-entry-title-link" title="SimplicityとWordPress Popular Postsを関連づける方法">
                                SimplicityとWordPress Popular Postsを関連づける方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        最近、メールなどでSimplicityとWordPress Popular Postsに関する質問をいくつかいただきました。 内容は、...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/searchform-style/" title="Simplicity検索ボックスのスタイルいろいろ">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Simplicity検索ボックスのスタイルいろいろ"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/searchform-style/" class="related-entry-title-link"
                               title="Simplicity検索ボックスのスタイルいろいろ">
                                Simplicity検索ボックスのスタイルいろいろ </a></h3>
                    </header>
                    <p class="related-entry-snippet">


                        Simplicity20140828から、ブログの検索窓のスタイルをテーマカスタマイザーから変更できるようにしました。 Wor...

                    </p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/searchform-style/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/go-to-top-custum/" title="Simplicityでトップへ戻るボタンに画像を使用する方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Simplicityでトップへ戻るボタンに画像を使用する方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/go-to-top-custum/" class="related-entry-title-link"
                               title="Simplicityでトップへ戻るボタンに画像を使用する方法">
                                Simplicityでトップへ戻るボタンに画像を使用する方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">


                        Simplicityデフォルトでは、記事をスクロールなどすると、画面右下に以下のような「トップへ戻るボタン」が表示されます。 ...

                    </p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/go-to-top-custum/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/ads-settings/" title="「広告の設定」カスタマイズについての解説">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="「広告の設定」カスタマイズについての解説"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/ads-settings/" class="related-entry-title-link"
                               title="「広告の設定」カスタマイズについての解説">
                                「広告の設定」カスタマイズについての解説 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicityでは、広告の表示や位置などの設定を行うことができます。 広告の貼り付け方の設定は以下の記事を参照してください。 ...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/ads-settings/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/twitter-cards/" title="Twitter Cardsへの登録方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/07/Twitter-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Twitter Cardsへの登録方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/07/Twitter-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/07/Twitter-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/07/Twitter-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/twitter-cards/" class="related-entry-title-link"
                               title="Twitter Cardsへの登録方法">
                                Twitter Cardsへの登録方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicityでは、プラグインを使用せずとも、デフォルトで以下のようなTwitter Cards情報のタグが挿入されます。 ...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/twitter-cards/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/simplicity1-to-2-child-theme-settings/"
                       title="Simplicity1用の子テーマをSimplicity2で使う時の修正方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="Simplicity1用の子テーマをSimplicity2で使う時の修正方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/simplicity1-to-2-child-theme-settings/"
                               class="related-entry-title-link" title="Simplicity1用の子テーマをSimplicity2で使う時の修正方法">
                                Simplicity1用の子テーマをSimplicity2で使う時の修正方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity2を公開しました。 Simplicity2の子テーマも公開しています。 ただ、Simplicity1の子テーマは、...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/simplicity1-to-2-child-theme-settings/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/simplicity1-to-2-customizer/"
                       title="Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/simplicity1-to-2-customizer/" class="related-entry-title-link"
                               title="Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法">
                                Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity2を公開しました。 Simplicity2の子テーマも公開しています。 Simplicity2では、テーマカスタマ...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/simplicity1-to-2-customizer/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/how-to-set-big-header-image/" title="Simplicityに画面幅いっぱいのヘッダー画像を設定する方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Simplicityに画面幅いっぱいのヘッダー画像を設定する方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/how-to-set-big-header-image/" class="related-entry-title-link"
                               title="Simplicityに画面幅いっぱいのヘッダー画像を設定する方法">
                                Simplicityに画面幅いっぱいのヘッダー画像を設定する方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity1.4から、テーマカスタマイザーだけで、以下のような画面幅いっぱいのヘッダー画像を設定できるようになりました。 この...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/how-to-set-big-header-image/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/ptengine/" title="SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/ptengine/" class="related-entry-title-link"
                               title="SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法">
                                SimplicityでPtengineのア���セス解析（ヒートマップ分析）を行う方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity1.7.7より、カスタマイザーでIDを設定することにより、Ptengineでの解析を行えるようになりました。 Pten...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/ptengine/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/skin-parts/" title="Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/skin-parts/" class="related-entry-title-link"
                               title="Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様">
                                Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity1.7.9でパーツスキン機能を実装しました��� 以前にもスキン機能というのはありました。 パーツスキン機能も、スキン機...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/skin-parts/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->


            <br style="clear:both;"></aside>
    </div>



    <div class="col-md-3">
        <div class="sidebar-widget">
            <aside id="archives-3" class="widget widget_archive"><h3 class="widget_title sidebar_widget_title">
                    ย้อนหลัง</h3>
                <ul class="years">
                    <li class="year_2016"><a class="year">2016年</a>
                        <ul class="month">
                            <li><a href="https://wp-simplicity.com/2016/12/">12月</a> (1)</li>
                            <li><a href="https://wp-simplicity.com/2016/11/">11月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2016/10/">10月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2016/09/">9月</a> (5)</li>
                            <li><a href="https://wp-simplicity.com/2016/08/">8月</a> (8)</li>
                            <li><a href="https://wp-simplicity.com/2016/07/">7月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2016/06/">6月</a> (7)</li>
                            <li><a href="https://wp-simplicity.com/2016/05/">5月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2016/04/">4月</a> (7)</li>
                            <li><a href="https://wp-simplicity.com/2016/03/">3月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2016/02/">2月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2016/01/">1月</a> (6)</li>
                        </ul>
                    </li>
                    <li class="year_2015"><a class="year">2015年</a>
                        <ul class="month hide">
                            <li><a href="https://wp-simplicity.com/2015/12/">12月</a> (6)</li>
                            <li><a href="https://wp-simplicity.com/2015/11/">11月</a> (6)</li>
                            <li><a href="https://wp-simplicity.com/2015/10/">10月</a> (2)</li>
                            <li><a href="https://wp-simplicity.com/2015/09/">9月</a> (7)</li>
                            <li><a href="https://wp-simplicity.com/2015/08/">8月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2015/07/">7月</a> (12)</li>
                            <li><a href="https://wp-simplicity.com/2015/06/">6月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2015/05/">5月</a> (9)</li>
                            <li><a href="https://wp-simplicity.com/2015/04/">4月</a> (8)</li>
                            <li><a href="https://wp-simplicity.com/2015/03/">3月</a> (10)</li>
                            <li><a href="https://wp-simplicity.com/2015/02/">2月</a> (10)</li>
                            <li><a href="https://wp-simplicity.com/2015/01/">1月</a> (13)</li>
                        </ul>
                    </li>
                    <li class="year_2014"><a class="year">2014年</a>
                        <ul class="month hide">
                            <li><a href="https://wp-simplicity.com/2014/12/">12月</a> (14)</li>
                            <li><a href="https://wp-simplicity.com/2014/11/">11月</a> (17)</li>
                            <li><a href="https://wp-simplicity.com/2014/10/">10月</a> (18)</li>
                            <li><a href="https://wp-simplicity.com/2014/09/">9月</a> (19)</li>
                            <li><a href="hattps://wp-simplicity.com/2014/08/">8月</a> (31)</li>
                            <li><a href="https://wp-simplicity.com/2014/07/">7月</a> (33)</li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
    </div>
@stop