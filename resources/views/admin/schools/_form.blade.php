{{--
{{dd($errors)}}
--}}




<div id="exTab2">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#school" data-toggle="tab">School Data</a></li>
        {{--   <li><a href="#seo" data-toggle="tab">SEO</a></li>--}}
    </ul>
    <div class="tab-content ">
        <div class="tab-pane active" id="school">
            <div class="form-body">
                <div class="font-blue-soft"><h3 class="form-section">{{$text}} School</h3></div>
                <br>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputWarning">Arabic Name</label>
                    <div class="col-md-9">
                        {{Form::text('name_ar',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('name_ar')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">English Name</label>
                    <div class="col-md-9">
                        {{Form::text('name_en',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('name_en')}}</small>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Logo</label>
                    <div class="col-md-9">
                        @if(@$school && $school->logo != '')
                            <div class="col-md-9"  >
                                <img src="{{loadAsset('uploads/'.$school->logo)}}" style="height: 100px" alt="{{$school->name_en}}">
                            </div>
                        @endif
                        {{Form::file('log',['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('log')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Student Num</label>
                    <div class="col-md-9">
                        {{Form::text('student_num',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('student_numstudent_num')}}</small>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Arabic Address</label>
                    <div class="col-md-9">
                        {{Form::text('address_ar',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('address_ar')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">English Address</label>
                    <div class="col-md-9">
                        {{Form::text('address_en',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('address_en')}}</small>
                    </div>
                </div>
                {{--countries--}}
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Location</label>
                    <div class="col-md-3">
                        @if($text == 'Update')
                            {{Form::select('country_id',$countries['data'],$countries['selected'],['class'=>'form-control school-register-center','id'=>'country_id'])}}
                        @else
                            <select  class="form-control school-register-center" name="country_id" id="country">
                                <option value="0">Country</option>
                            </select>
                        @endif
                    </div>
                    <div class="col-md-3">
                        @if($text == 'Update')
                            {{Form::select('city_id',$cities['data'],$cities['selected'],['class'=>'form-control school-register-center','id'=>'city_id'])}}
                        @else
                            <select  class="form-control school-register-center" name="city_id" id="city">
                                <option value="0">City</option>
                            </select>
                        @endif
                    </div>
                    <div class="col-md-3">
                        @if($text == 'Update')
                            {{Form::select('district_id',$districts['data'],$districts['selected'],['class'=>'form-control  school-register-center select2','id'=>'district_id'])}}
                        @else
                            <select  class="form-control school-register-center" id="district_id" name="district_id">
                                <option value="0">District</option>
                            </select>
                        @endif
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Phone</label>
                    <div class="col-md-9">
                        {{Form::text('phone',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('phone')}}</small>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Email</label>
                    <div class="col-md-9">
                        {{Form::text('email',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('email')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Website</label>
                    <div class="col-md-9">
                        {{Form::text('website',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('website')}}</small>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Facebook Page</label>
                    <div class="col-md-9">
                        {{Form::text('facebook',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('facebook')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Instagram Page</label>
                    <div class="col-md-9">
                        {{Form::text('instagram',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('instagram')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Linkedin Page</label>
                    <div class="col-md-9">
                        {{Form::text('linkedin',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('linkedin')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Youtube Page</label>
                    <div class="col-md-9">
                        {{Form::text('youtube',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('youtube')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Google+</label>
                    <div class="col-md-9">
                        {{Form::text('googleplus',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('google+')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Admission Link</label>
                    <div class="col-md-9">
                        {{Form::text('admission_url',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('admission_url')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Admission Date</label>
                    <div class="col-md-9">
                        {{Form::date('admission_date',null,['class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('admission_date')}}</small>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Arabic About</label>
                    <div class="col-md-9">
                        {{Form::textarea('about_ar',null,['rows'=>3,'class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('about_ar')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">English About</label>
                    <div class="col-md-9">
                        {{Form::textarea('about_en',null,['rows'=>3,'class'=>'form-control'])}}
                        <small class="text-danger">{{$errors->first('about_en')}}</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">School Gallery</label>
                    <div class="input-group col-md-8">
                        <div class="col-md-12">
                            @if(@$school && $school->school_gallery_images != '')
                                @foreach($school->school_gallery_images as $image )
                                    <div class="col-md-3">
                                        <img src="{{loadAsset('uploads/'.$image->url)}}" style="width: 100px;height:  100px;">
                                        <a href="{{loadAsset("admin/schools/deleteImage/".$image->id)}}"><i class="fa fa-times fa-2x" style="position:absolute;top: 10px;"></i></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="col-md-12">
                            <span class="input-group-btn">
                            <input type="file" name="images[]" class="form-control">
                                <button class="btn btn-default addImages" type="button"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="imageWrapper"></div>
                {{--///////////////////////////////////////////////////--}}
                <div class="form-group col-md-12">
                    <label class="control-label col-md-2" for="inputError">Facilities</label>
                    <div class="col-md-9">
                        <small class="text-danger">{{$errors->first('facilities')}}</small>
                        @foreach($facilitiesTypes as $type)
                            <label class="text-primary font-weight-bold control-label col-md-12" for="inputError">{{$type->name_en}}</label>
                            @foreach($type->facility_values as $checkbox)
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="facilities_{{$checkbox['id']}}">
                                        {{Form::checkbox('facilities[]',$checkbox['id'],@(in_array($checkbox['id'],$facilitiesValueSchool))?1:0,['id'=>"facility_".$checkbox['id'],'class'=>'facility_checkbox group_'.$type->id])}}
                                        {{$checkbox->name_en}}
                                    </label>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div id="fees-wrapper" class="row col-md-12">
                    @if($text == 'Update')
                        @foreach($school->fees as $fees)
                            <div class="form-group facility_8">
                                <label class="control-label col-md-2" for="inputWarning">{{$fees->name_en}}</label>
                                <div class="input-group">
                                    {{Form::number('updateFees['.$fees->id.'][amount]',$fees->amount,['class'=>'form-control col-md-6'])}}
                                    <span class="input-group-btn">
                                        {{Form::select('updateFees['.$fees->id.'][unit]',['EGP'=>'EGP','USD'=>'USD','GPP'=>'GPP'],$fees->unit,['class'=>'form-control col-md-3','style'=>'width: 100px;'])}}

                                    </span>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default removeFeesItem" type="button">x</button>
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="col-md-12">
                    <label for="map">Map</label>
                    <input id="pac-input" class="form-control controls" rows="3" onkeydown="if (event.keyCode == 13) { return false;}" placeholder="Search by District"  type="text">
                </div>
                <div class="col-md-12">
                    <div id="map"></div>
                </div>
                {{Form::hidden('longitude',null,['id'=>'longitude'])}}
                {{Form::hidden('latitude',null,['id'=>'latitude'])}}
            </div>
        </div>
        {{--<div class="tab-pane" id="seo">
            @include('admin.seoschools._form',['data'=>@$school->seo])
        </div>--}}
    </div>
    <div class="clear-fix"></div>

    <div class="row">
        <div class="col-md-12 text-right">
            <div class="row">
                <div class="col-md-12 pull-left">
                    {{Form::submit($text,['class'=>'btn green'])}}
                    <a href="{{url('/admin/schools')}}" type="button" class="btn default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
    <script>
        $('.addImages').on('click',function () {
            $('#imageWrapper').append('<div class="form-group col-md-12"> \n' +
                '                <label class="control-label col-md-2" for="inputError"></label>\n' +
                '                <div class="input-group col-md-8">\n' +
                '                    <div class="col-md-12">\n' +
                '                    <span class="input-group-btn">\n' +
                '                        <input type="file" name="images[]" class="form-control">\n' +
                '                        <button class="btn btn-default removeImage" type="button"><i class="fa fa-times"></i></button>\n' +
                '                    </span>\n' +
                '                </div>\n' +
                '                </div>\n' +
                '            </div>');

        });
        $(document).on('click','.removeImage',function () {
            $(this).parent().parent().parent().parent().remove();
        });
        $(document).ready(function () {
            initRegions("{{($text == 'Update')?"edit":"add"}}");
        });
    </script>
    <script>
        var depending1                = 'group_3';
        var depending2                = 'group_5';
        var $checkedCertificates      = [];
        var $checkedEducationLevel    = [];
        $('.facility_checkbox').on('click',function () {
            clearDivOfInputs();
            if($(this).is(':checked')){
                if($(this).hasClass(depending1)){
                    $checkedCertificates.push($(this).attr('id'));
                    $.unique($checkedCertificates);
                    console.log($checkedCertificates);
                }
                if($(this).hasClass(depending2)){
                    $checkedEducationLevel.push($(this).attr('id'));
                    $.unique($checkedEducationLevel);
                    console.log($checkedEducationLevel);
                }
            }else{
                if($(this).hasClass(depending1)){
                    var removeItem = $(this).attr('id');
                    $checkedCertificates.splice( $.inArray(removeItem, $checkedCertificates), 1 );
                    console.log($checkedCertificates);
                }
                if($(this).hasClass(depending2)){
                    var removeItem = $(this).attr('id');
                    $checkedEducationLevel.splice( $.inArray(removeItem, $checkedEducationLevel), 1 );
                    console.log($checkedEducationLevel);
                }
            }
            ////////////////////////// LoooP ////////////////////////
            $.each($checkedCertificates,function(keys,certificates) {
                $.each($checkedEducationLevel,function(k,educationLevel) {

                    var $selector1 = $('#'+certificates);
                    var $selector2 = $('#'+educationLevel);
                    var label1 = $selector1.parent().text();
                    var label2 = $selector2.parent().text();
                    var certificate_id      = certificates.split('_')[1] ;
                    var educationLevel_id   = educationLevel.split('_')[1];
                    var fee=
                        '<div class="form-group '+educationLevel+'">\n'+
                        '<label class="control-label col-md-2" for="inputWarning">'+label1 + label2 +'</label>\n' +
                        '<div class="input-group">'+
                        '<input class="form-control col-md-6" name="fees['+certificate_id+']['+educationLevel_id+'][cost]" type="number">'+
                        '<span class="input-group-btn">'+
                        '<select class="form-control col-md-3" style="width: 100px;" name="fees['+certificate_id+']['+educationLevel_id+'][currecy]">'+
                        '<option value="EGP">EGP</option>'+
                        '<option value="USD">USD</option>'+
                        '<option value="GPP">GPP</option>'+
                        '</select>'+
                        '</span>'+
                        '<span class="input-group-btn">'+
                        '<button class="btn btn-default removeFeesItem" type="button">x</button>'+
                        '</span>'+
                        '</div>'+
                        '</div>';
                    $('#fees-wrapper').append(fee);
                });
            });
        });


        function clearDivOfInputs() {
            $('#fees-wrapper').empty();
            $checkedCertificates    = [];
            $checkedEducationLevel  = [];
            $('input.'+depending1+':checked').each(function () {
                $checkedCertificates.push($(this).attr('id'));
            });
            $('input.'+depending2+':checked').each(function () {
                $checkedEducationLevel.push($(this).attr('id'));
            });

        }

        $(document).on('click','.removeFeesItem',function () {
            var checkBoxId =  $(this).parent().parent().parent().attr('class').split(/\s+/)[1];
            $(this).parent().parent().parent().remove();

            var group = $('#'+checkBoxId).attr('class').split(/\s+/)[1];

            if(group == depending1){
                $checkedCertificates.splice( $.inArray(checkBoxId, $checkedCertificates), 1 );
            }
            if(group == depending2){
                $checkedEducationLevel.splice( $.inArray(checkBoxId, $checkedEducationLevel), 1 );
            }

            var inputsCount = $('.form-group.'+checkBoxId).length;
            if(inputsCount == 0){
                $('#'+checkBoxId).prop("checked", false);
            }
            console.log(inputsCount);
        })


    </script>

    <script>
        $('#initMap').attr('src','https://maps.googleapis.com/maps/api/js?key=AIzaSyDtaIwmepScDMmCOqr7-WszNY0HU4uwhdY&libraries=places&callback=initAutocomplete');

        var map = null;
        var marker = null;

        function initAutocomplete() {
            var mapProp = {
                zoom: 6,
                center: new google.maps.LatLng({lat:'{{(@$school && $school->latitude)?$school->latitude:27.229125244733567}}', lng:'{{(@$school && $school->longitude)?$school->longitude:32.23411537706852}}' }),
                mapTypeId: 'roadmap',
            };
            map = new google.maps.Map(document.getElementById('map'), mapProp);
            /*var styles = [{stylers: [{hue: "#c5c5c5"}, {saturation: -100}]},];
            map.setOptions({styles: styles});*/
            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            map.addListener('click', function(event) {
                //call function to create marker
                if (marker) {
                    marker.setMap(null);
                    marker = null;
                }
                marker = createMarker(event.latLng, "name", "<b>Location</b><br>"+event.latLng);

            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };



                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });

            marker = createMarker(mapProp.center, "name", "");
        }


        function createMarker(latlng, name, html) {
            var contentString = html;
            var marker = new google.maps.Marker({
                position: latlng,
                map: map,
                zIndex: Math.round(latlng.lat()*-100000)<<5,
                draggable:true
            });
            google.maps.event.trigger(marker, 'click');
            $('#latitude').val(latlng.lat());
            $('#longitude').val(latlng.lng());
            return marker;
        }

        //$('.school-register-center').select2();
    </script>
@endsection