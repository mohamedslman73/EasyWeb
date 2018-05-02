@extends("layouts.app")
@section('upperSlogan')
    addSchool
@endsection

@section('css')
    <link rel="stylesheet" href="{{loadAsset('backend/website/css/addSchoolStyle.css')}}">
{{--
    <link rel="stylesheet" href="{{loadAsset('backend/website/css/dropzone.css')}}">
--}}
@endsection
@section('script')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxtTPA2oXJVUu4M2Y0sauUwTzgQpeESoo&libraries=places&callback=initMap" async defer></script>
<script src="{{ asset('js/addSchool.js')}}"></script>


@endsection

@section('content')
    <section class="allweb-cont-bod"><!-- start wrap all web -->
        <div class="container bod-add-all">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
            <div class="row">
                <div class="col-md-12">

                    <form class="col-md-12" id="regForm" action="{{route('addSchoolFront')}}" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 head-of-wiz">
                            <h4>30 seconds from you to add new school makes the world better place. ...</h4>
                            <!--<hr>-->
                            <div class="bor-der"></div>
                        </div>
                        <!--One "tab" for each step in the form:-->
                        <div class="firest-tab tab"><!--== start first tap ==-->
                            <div class="col-md-2 a-s-i-ad-ph register-upload-img " >
                                <input type="file" name="logo" id="image" class="hidden" accept="image/*">
                                <label for="image" class="btn"><i class="fa fa-user-circle fa-5x" aria-hidden="true"></i></label><br>
                                <label for="image" name="logo" class="btn label-add">Add picture</label><br>
                                <!-- <small class="text-danger">Error happened</small> -->
                            </div>
                            <div class="col-md-5">
                                <p>
                                    <input placeholder="School Name..."  name="name" >
                                    <!-- <small class="text-danger">Error happened</small> -->
                                </p>
                                <p>
                                    <input name="Address" placeholder="Address..."  >
                                    <!-- <small class="text-danger">Error happened</small> -->
                                </p>
                            </div>
                            <div class="col-md-5">
                                <div class="col-md-12">
                                    <select name="country" class="form-control school-register-center" class="sel1" required>
                                        <option disabled selected>Country</option>
                                        @foreach($countries as $country)
                                          <option value="{{$country->id}}">{{$country->name_en}}</option>
                                        @endforeach
                                    </select>
                                    <!-- <small class="text-danger">Error happened</small> -->
                                </div>
                                <div class="col-md-6">
                                    <select name="city" class="form-control school-register-center" class="sel1" required>
                                        <option disabled selected>City</option>
                                    </select>
                                    <!-- <small class="text-danger">Error happened</small> -->
                                </div>
                                <div class="col-md-6">
                                    <select name="district_id" class="form-control school-register-center" class="sel1" required>
                                        <option disabled selected>District</option>
                                    </select>
                                    <!-- <small class="text-danger">Error happened</small> -->
                                </div>
                            </div>
                        </div><!--== end first tab ==-->


                        <div class="seco-tab col-md-12 tab"><!--== start second tab ==-->

                            <div class="col-md-6"><!-- START MAIN COL 6 -->

                                <div class="col-md-12 mial-box-ad-sc">
                                    <!-- start input -->
                                    <div class="col-md-12 ad-conc ad-conc-dd">
                                            <input style="width: 100%" id="add3" placeholder="Email ..." type="email" name="email" class="form-control" aria-label="..." required>
                                        </div><!-- /input-group -->
                                    {{--</div>--}}
                                    <!-- end input -->
                                </div>



                                <div class="col-md-12 mial-box-ad-sc">
                                    <!-- start input -->
                                    <div class="col-md-12 ad-conc ad-conc-dd">
                                        {{--<div class="input-group">--}}
                                            <input  placeholder="website ..." type="text" name="website" class="form-control" aria-label="...">
                                        {{--</div><!-- /input-group -->--}}
                                    </div>
                                    <!-- end input -->
                                </div>


                                <div class="col-md-12 numbers-box-ad-sc">
                                    <!-- start input -->
                                    <div class="col-md-12 ad-conc ad-conc-dd">
                                        {{--<div class="input-group">--}}
                                            <input id="" placeholder="numbers ..." name="phone" type="text" class="form-control" aria-label="...">
                                            {{--<div class="input-group-btn">--}}
                                                {{--<button id="adon14" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></button>--}}
                                            {{--</div><!-- /btn-group -->--}}
                                        {{--</div><!-- /input-group -->--}}
                                    </div>
                                    <!-- end input -->
                                </div>


                                <div class="col-md-12 addmission-box-ad-sc">
                                    <!-- start input -->
                                    <div class="col-md-12 ad-conc ad-conc-dd">
                                            <input  placeholder="Addmission url ..." type="text" name="admission_url" class="form-control" aria-label="...">
                                    </div>
                                    <!-- end input -->
                                </div>


                                <div class=" col-md-12"><!-- start date picker -->
                                    <div class="col-md-12">
                                        <input type="date" name="admission_date" class="date-picker">
                                    </div>
                                </div><!-- end date picker -->

                            </div><!-- END MAIN COL 6 -->

                            <div class="col-md-6 tex-about-ad-s">
                                <div>
                                    <textarea placeholder="about" name="about"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <input type="number" name="student_num" placeholder="student number" class="date-picker">
                                </div>

                            </div>

                        </div><!--== end second tab ==-->





                        <div class="col-md-12 tab"><!--== start third tab ==-->
                            <section id="m.abdo" class="schools facilities-texture">

                                <div class="row ">
                                    <div class="head-fac col-md-12">
                                        <div class="col-md-6"> <h3 class="facilities">Facilities</h3></div>
                                    </div>

                                    @foreach($facilitiesTypes as $type)
                                    <div class="facilities-ul col-md-3 col-sm-6 col-xs-6">
                                        <ul class=" list-unstyled">
                                            <h5><strong>{{$type->name_en}}</strong></h5>
                                            @php $group_id = $type->id; @endphp
                                            @foreach($type->facility_values as $value)
                                            <li>
                                              <label class="" for="facilities_{{$value->id}}">
                                                <input name="facilities[]" id="facility_{{$value->id}}" class="facility_checkbox group_{{$group_id}}" name="facilities[]" type="checkbox" value="{{$value->id}}">
                                                {{$value->name_en}}
                                              </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endforeach
                                    <div id="fee-wrapper"></div>
                                </div><!-- row -->
                            </section>
                        </div><!--== end third tab ==-->
                        <div class="col-md-12 tab">
                            <div class="col-md-12">
                                <h3 class="col-md-6 info-header">School fees</h3>
                            </div>

                            <div id="fees-wrapper" class="row col-md-12">

                            </div>




                                <div class="col-md-12 add-img-gal-a-sc"><!-- start gallery -->
                                    <div class="col-md-12"><!-- start head -->
                                        <h4>Image gallery</h4>
                                    </div><!-- end head -->
                                    <div class="col-md-12 add-img-gal-a-sc-bod">
                                        <input type="file" name="images[]" >
                                    </div>
                                </div><!-- end gallery -->

                            </div><!-- end fee -->

                        </div><!-- end tab -->
                        <div class="col-md-12 tab"><!--== start fifth tab ==-->
                            <div class="col-md-6">
                                <div class="input-group col-md-12 r-soc-ad-s">
                                    <input type="email" id="add4" name="facebook" placeholder="facebook url" class="form-control" aria-label="...">
                                </div><!-- /input-group -->
                                <div class="input-group col-md-12 r-soc-ad-s">
                                    <input type="email" id="add4" name="twitter" placeholder="twitter url" class="form-control" aria-label="...">
                                </div><!-- /input-group -->
                                <div class="input-group col-md-12 r-soc-ad-s">
                                    <input type="email" id="add4" name="linkedin" placeholder="linkedIn url" class="form-control" aria-label="...">
                                </div><!-- /input-group -->
                            </div>

                            <div class="col-md-6">
                                <div class="input-group col-md-12 r-soc-ad-s">
                                    <input type="email" id="add4" name="instagram" placeholder="instagram" class="form-control" aria-label="...">
                                </div><!-- /input-group -->
                                <div class="input-group col-md-12 r-soc-ad-s">
                                    <input type="email" id="add4" name="youtube" placeholder="youtube" class="form-control" aria-label="...">
                                </div><!-- /input-group -->
                                <div class="input-group col-md-12 r-soc-ad-s">
                                    <input type="email" id="add4" name="google+" placeholder="google +" class="form-control" aria-label="...">
                                </div><!-- /input-group -->
                            </div>



                            <div class="col-md-12">
                                <section class="mabs-ad-sc">

                                    <div id="pac-container" style="text-align: center;">
                                        <input id="pac-input" type="text" name="longitude" placeholder="Enter a location" style=" " autocomplete="off">
                                    </div>
                                    <div id="map" style="margin: auto; width: 100%; height: 300px; position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div tabindex="0" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="z-index: 1; position: absolute; top: 0px; left: 0px; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: 412px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 412px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 668px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 668px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 412px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 412px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 668px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 156px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 924px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 156px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 924px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 668px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 924px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 156px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 156px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 924px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -100px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1180px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1180px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -100px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1180px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -100px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -100px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1180px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1436px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1436px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1436px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1436px; top: 588px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1692px; top: 332px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1692px; top: 76px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1692px; top: -180px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 1692px; top: 588px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 412px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 412px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 668px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 668px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 412px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 412px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 668px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 156px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 924px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 156px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 924px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 668px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 924px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 156px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 156px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 924px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -100px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1180px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1180px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -100px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1180px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -100px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -100px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1180px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1436px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1436px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1436px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1436px; top: 588px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1692px; top: 332px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1692px; top: 76px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1692px; top: -180px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 1692px; top: 588px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="position: absolute; left: 412px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76975!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=97419" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 412px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76975!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=2369" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 668px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76976!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=57698" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 668px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76976!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=93719" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 924px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76977!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=17977" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 924px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76977!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=53998" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 412px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76975!3i54063!4i256!2m3!1e0!2sm!3i405101173!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=108258" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 412px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76975!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=61398" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 156px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76974!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=6069" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 156px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76974!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=42090" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 924px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76977!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=113027" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 156px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76974!3i54063!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=78111" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 924px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76977!3i54063!4i256!2m3!1e0!2sm!3i405101173!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=28816" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -100px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76973!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=81811" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -100px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76973!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=45790" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 668px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76976!3i54063!4i256!2m3!1e0!2sm!3i405101173!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=68537" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 156px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76974!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=101119" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1180px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76978!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=73306" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1180px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76978!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=14277" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1180px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76978!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=109327" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -100px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76973!3i54063!4i256!2m3!1e0!2sm!3i405101690!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=94640" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 668px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76976!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=21677" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1180px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76978!3i54063!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=50298" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -100px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76973!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=9769" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1436px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76979!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=33585" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1436px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76979!3i54063!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=10577" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1436px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76979!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=105627" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1692px; top: 332px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76980!3i54062!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=73498" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1436px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76979!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=69606" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1692px; top: 76px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76980!3i54061!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=37477" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1692px; top: -180px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76980!3i54060!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=1456" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 1692px; top: 588px; transition: opacity 200ms ease-out;"><img draggable="false" alt="" src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i17!2i76980!3i54063!4i256!2m3!1e0!2sm!3i405099950!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=109519" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0; transition-duration: 0.8s;"><p class="gm-style-pbt">Use ctrl + scroll to zoom the map</p></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"><div style="z-index: 1; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"></div></div><div style="z-index: 4; position: absolute; top: 0px; left: 0px; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=30.036108,31.422855&amp;z=17&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" title="Click to see this area on Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 700px; top: 210px;"><div style="padding: 0px 0px 10px; font-size: 16px;">Map Data</div><div style="font-size: 13px;">Map data ©2017 Google, ORION-ME</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 172px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map Data</a><span style="">Map data ©2017 Google, ORION-ME</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2017 Google, ORION-ME</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms of Use</a></div></div><button draggable="false" title="Toggle fullscreen view" aria-label="Toggle fullscreen view" type="button" style="background: none; border: 0px; margin: 10px 14px; padding: 0px; position: absolute; cursor: pointer; user-select: none; width: 25px; height: 25px; overflow: hidden; top: 0px; right: 0px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></button><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Report errors in the road map or imagery to Google" href="https://www.google.com/maps/@30.036108,31.4228549,17z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;"><button draggable="false" title="Zoom in" aria-label="Zoom in" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></button><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" title="Zoom out" aria-label="Zoom out" type="button" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: relative; cursor: pointer; user-select: none; width: 28px; height: 27px; top: 0px; left: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></button></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px;"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Pegman is on top of the Map" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Street View Pegman Control" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Rotate map 90 degrees" style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; display: none;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; top: 0px; cursor: pointer;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left; position: relative;"><div role="button" tabindex="0" title="Show street map" aria-label="Show street map" aria-pressed="true" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 22px; font-weight: 500;">Map</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none;"><div draggable="false" title="Show street map with terrain" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img alt="" src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Terrain</label></div></div></div><div class="gm-style-mtc" style="float: left; position: relative;"><div role="button" tabindex="0" title="Show satellite imagery" aria-label="Show satellite imagery" aria-pressed="false" draggable="false" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 40px; border-left: 0px;">Satellite</div><div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none;"><div draggable="false" title="Show imagery with street names" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img alt="" src="https://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Labels</label></div></div></div></div></div></div></div>

                                    <div id="infowindow-content">
                                        <img src="" width="16" height="16" id="place-icon">
                                        <span id="place-name" class="title"></span><br>
                                        <span id="place-address"></span>
                                    </div>
                                </section>
                            </div>

                        </div><!--== end fifth tab ==-->






                        <div class="button-nec-pre col-md-12 ">
                            <div class="pull-right">
                                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="col-md-12 ">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                            <!--<span class="step"></span>-->
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </section><!--start wrap all web -->




@endsection
