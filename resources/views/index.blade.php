@extends("layouts.app")
@section('css')
    {{--
        <link href="{{loadAsset('backend/website/css/style.css')}}" rel="stylesheet"/>
    --}}
@endsection
@section('content')
    <!-- ********* cont-home ********** -->
    <section class="cont-home">
        <div class="container text-center">
            <div class="row">
                <h2>WELCOME TO THE BIGGEST SCHOOLS  </h2>
                <h2>PLATFORM</h2>
                <div class="col-md-12">
                    <form id="formSearch" autocomplete="off" action="{{route('search',['lang'=>app()->getLocale()])}}" method="get">
                        <input class="text-center inpu-se-sch" id="search" type="text" on name="search" placeholder="{{ trans('messages.find_your_school') }}">
                    </form>
                    <ul class="table table-bordered table-hover auto" id="app">
                        {{--<th>Product Name</th>--}}
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <p class="adv-searsh">{{trans('messages.advSearch')}}</p>
                    <p class="open-adv-bar  icon">Advanced Search</p>
                </div>
                @if (session('message'))
                    <div class="col-md-12">
                        <p class="ero-top">{{ session('message') }}</p>

                    </div>

                @endif

                <dropdown class="verb" >
                    <ul class="animate animate-ul">
                        <li class="animate">
                            <form style="display: block" action="{{route('advSearch',['lang'=>app()->getLocale()])}}" method="get">
                                <div style="width: 50%;     margin-right: 0%; " class="pppconten">
                                    <h4 class="drt">{{trans('messages.city')}}</h4>

                                    <div class="dropdown" data-control="checkbox-dropdown">

                                        <select  name="city" id="city_idR"  class="sel" style="width: 100%;height: 30px;border: none;background-color: #018e9e;color: white;">
                                            <option value="0" disabled selected>{{trans('messages.select')}}</option>
                                            @foreach(App\City::all() as $city)
                                                <option class="form-control" value="{{$city['slug_'.app()->getLocale() ]}}">{{$city['name_'.app()->getLocale()]}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div style="width: 50%;margin-right: 0%;" class="pppconten">
                                    <h4 class="drt">{{trans('messages.district')}}</h4>
                                    <div class="dropdown" data-control="checkbox-dropdown">


                                        <select id="district_idR" name="district" style="width: 100%;height: 30px;border: none;background-color: #018e9e;color: white;">
                                            <option value="0">{{trans('messages.select')}}</option>
                                        </select>

                                    </div>
                                </div>
                                @foreach(\App\FacilityType::all() as $key=>$type)

                                    <div class="pppconten">
                                        <h4 class="drt">{{$type['name_'.app()->getLocale()]}}</h4>
                                        <div class="dropdown {{($key<2)? 'drop-zindi':""}}" data-control="checkbox-dropdown">
                                            <label class="dropdown-label animate">Select Options</label>
                                            <div class="dropdown-list">
                                                <a href="#" data-toggle="check-all" class="dropdown-option">Check All</a>
                                                @foreach(App\FacilityValue::where('facility_type_id',$type->id)->get() as $k=>$value)
                                                    <label class="dropdown-option">
                                                        <input type="checkbox" name="facilities[]" value="{{$value->id}}">
                                                        {{$value['name_'.app()->getLocale()]}}
                                                    </label>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12 price-slider">
                                    <div class="col-md-12 text-center">
                                        <h4>Range pricing <small>(EG)</small></h4>
                                    </div>
                                    <section class="range-slider container">
                                        <span class="output outputOne" style="left: 9.256%;">23140</span>
                                        <span class="output outputTwo" style="left: 40%;">100000</span>
                                        <span class="full-range"></span>
                                        <span class="incl-range" style="width: 30.744%; left: 9.256%;"></span>
                                        <input name="rangeOne" value="1" min="1" max="250000" step="1" type="range">
                                        <input name="rangeTwo" value="250000" min="1" max="250000" step="1" type="range">
                                    </section>
                                    <button type="submit" class="pull-right">search</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </dropdown>



                <div class="col-md-12 background-con-h">
                    <!--<img src="pic/BG%20.png" style="width: 100%;">-->

                    <div class="col-md-12 cont-home-b">
                        <h3>{{ trans('messages.partners') }}</h3>
                        @foreach(App\Partner::all() as $partner)
                            <a href="{{route('partners',['lang'=>app()->getLocale()])}}" style="text-decoration: none">
                                <img src="{{loadAsset("/uploads/".$partner->logo)}}" alt="EasySchools-{{$partner['name_'.app()->getLocale()]}}-logo">
                            </a>
                        @endforeach
                    </div>
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </section>

    <!--========== filter schools ============-->
    <ul class="she">
        @if(app()->getLocale()=='en')
        <li><a href='{{route('schoolsByCity',['city'=>'cairo','lang'=>app()->getLocale()])}}'>Cairo</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'alexandria','lang'=>app()->getLocale()])}}">Alexandria</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'giza','lang'=>app()->getLocale()])}}">Giza</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'helwan','lang'=>app()->getLocale()])}}">Helwan</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'qalubia','lang'=>app()->getLocale()])}}">Qalubia</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'sharkia','lang'=>app()->getLocale()])}}">Sharkia</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'gharbia','lang'=>app()->getLocale()])}}">Gharbia</a></li>
        <li><a href="{{route('schoolsByCity',['city'=>'ismailia','lang'=>app()->getLocale()])}}">Ismailia</a></li>
        @else
            <li><a href='{{route('schoolsByCity',['city'=>'القاهرة','lang'=>app()->getLocale()])}}'>القاهرة</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'الإسكندرية','lang'=>app()->getLocale()])}}">الإسكندرية</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'الجيزة','lang'=>app()->getLocale()])}}">الجيزة</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'حلوان','lang'=>app()->getLocale()])}}">حلوان</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'القليوبية','lang'=>app()->getLocale()])}}">القليوبية</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'الشرقية','lang'=>app()->getLocale()])}}">الشرقية</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'الغربية','lang'=>app()->getLocale()])}}">الغربية</a></li>
            <li><a href="{{route('schoolsByCity',['city'=>'الإسماعيلية','lang'=>app()->getLocale()])}}">الإسماعيلية</a></li>
        @endif
    </ul>

    <!-- ====== start all schools ======== -->

    <section class="a_schools">
        <div class="container">
            <div class="row">
                <!-- Modal content-->

                <!-- Modal -->
                @if(!Auth::user())
                    <div id="myModal" class="modal fade text-center" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content-index">
                                <div class="modal-body-index">
                                    <h3>{{ trans('messages.please') }} <a href="{{--{{route('sign_in',['lang'=>app()->getLocale()])}}--}}">{{ trans('messages.login') }}</a></h3>
                                    <h3>or</h3>
                                    <h3><a href="{{--{{route('sign_up',['lang'=>app()->getLocale()])}}--}}">{{ trans('messages.register') }}</a></h3>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
                @foreach($schools as $key=>$school)

                    <div class="col-md-4"><!-- == start col4 ==-->
                        <div class=" box-scol-wraper"><!-- start wraper -->
                            <div class="col-xs-4 logo-cor-s">
                                <img alt="{{$school['name_'.app()->getLocale()]}}-logo" src="{{$school->logo}}">
                            </div>
                            <div class="col-xs-5">
                                <a href="{{route('schoolProfile',['slug'=>$school['slug_'.app()->getLocale()],'lang'=>app()->getLocale()])}}">{{str_limit($school['name_'.app()->getLocale()],30)}}</a></p>
                            </div>
                            <div class="col-xs-3 col3">
                                <div class="col-xs-12">
                                    <p class="rating pull-right "><span>{{($school->Rate()!=0)?$school->Rate():3}}</span><i class="fa fa-star"></i></p>
                                </div>
                                @if(!Auth::user())
                                    <div class="col-xs-12">
                                        <p data-toggle="modal" data-target="#myModal" class="rating pull-right love-to "><span></span><i class="fa fa-heart-o"></i></p>
                                    </div>
                                    <div class="col-xs-12">
                                        <p data-toggle="modal" data-target="#myModal" class="rating pull-right "><span></span><i class="fa fa-exchange"></i></p>
                                    </div>
                                @else
                                    <div class="col-xs-12">
                                        <button id="#compare" value="{{$school->id}}" class="rating pull-right compa addCompare"><span></span><i class="fa fa-exchange"></i></button>
                                        <button id="#exitCompare" value="{{$school->id}}" class="rating pull-right  compa-sec exitCompare"><span></span><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="col-xs-12">
                                        <button value="{{$school->id}}" class="rating pull-right love-to love-bu addFavorite"><span></span><i class="fa fa-heart"></i></button>
                                        <button value="{{$school->id}}" class="rating pull-right love-to love-bu2 exitFavorite"><span></span><i class="fa fa-heart-o"></i></button>
                                    </div>
                                @endif
                                @if($key==0)
                                    <div class="compare-info-div">
                                        <!--<div id="triangle-left"></div>-->
                                        <i  class="fa fa-times times-close"></i>
                                        <p class="compare-info">
                                            <span>{{trans('messages.add_compare')}}</span>
                                        </p>
                                    </div>
                                @endif
                                @if($key==1)
                                    <div class="love-info-div">
                                        <!--<div id="triangle-left"></div>-->
                                        <i  class="fa fa-times times-close"></i>
                                        <p class="compare-info">
                                            <span>{{trans('messages.add_favorite')}}</span>
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div><!-- end wraper -->
                    </div><!--== end col4 ==-->

                @endforeach



            </div><!-- row -->
        </div><!-- container -->
    </section>


    <!-- ==================== start section Articles ====================== -->

    <div class="container ">
        <div class="col-xs-12">
            <hr class="hr-text" data-content="{{ trans('messages.blog') }}">
        </div>
    </div>


    <section>
        <div class="container">
            <div class="row">

                @if($articles)
                    @foreach($articles as $article)
                        <div class="col-md-4 "><!-- == start col4 ==-->
                            <div class=" box-scol-wraper-arti"><!-- start wraper -->
                                <h4 class="text-center">{{str_limit($article['title_'.app()->getLocale()],30)}}</h4>
                                <p>
                                    {{strip_tags(str_limit($article['text_'.app()->getLocale()],70))}}
                                </p>
                                <div class="col-md-12">
                                    <p class="pull-right">
                                        <a href="{{route('showArticle',['lang'=>app()->getLocale(),'article'=>$article->id])}}">
                                            Read more
                                        </a>
                                    </p>
                                </div>
                            </div><!-- end wraper -->
                        </div>
                    @endforeach
                @else
                    <div class="text-center">
                        <p class="text-danger">{{ trans('messages.blog') }}</p>
                    </div>
                @endif
            </div><!-- row -->
        </div><!-- container -->
    </section>

    <!-- ========================================= start section district =====================================-->


    <div class="container">
        <div class="col-xs-12">
            <hr class="hr-text" data-content="{{ trans('messages.schoolsByDistricts') }}">
        </div>
    </div>



    <section class="f-district">
        <div class="container">
            <div class="row ">

                @foreach(@$districts as $district)
                    <div class="col-md-2 col-xs-6  cor-distr-name">
                        <a href="{{route('schoolsByDistrict',['lang'=>app()->getLocale(),'district'=>$district['slug_'.app()->getLocale()]])}}">
                            {{$district['name_'.app()->getLocale()]}}</a>
                    </div>
                @endforeach

            </div><!-- row -->
        </div><!-- container -->
    </section>

@endsection
@section('script')
    <script>
        //compare
        $(document).on('click','.addCompare',function () {
            var school = $(this).val();
            var status='This school added to your Compare Schools';
            var fun='addCompare';
            ajaxCall(fun,school,status);
        });
        $(document).on('click','.exitCompare',function () {
            var school = $(this).val();
            var status='This school deleted from your Compare Schools';
            var fun='deleteCompare';
            ajaxCall(fun,school,status);
        });
        //favorite
        $(document).on('click','.addFavorite',function () {
            var school = $(this).val();
            var status='This school add to your Favorite Schools';
            var fun='addFavorite';
            ajaxCall(fun,school,status);
        });
        $(document).on('click','.exitFavorite',function () {
            var school = $(this).val();
            var status='This school deleted from your Favorite Schools';
            var fun='deleteFavorite';
            ajaxCall(fun,school,status);
        });


        function ajaxCall(fun,school,status) {
            var _token='{{csrf_token()}}';
            $.ajax({
                type:'post',
                url:"{{ url('/'.app()->getLocale()) }}/" + fun,
                dataType:'json',
                data:{school:school,_token:_token},
                success:function(data) {
                    alert(status)
                },error:function() {
                    alert('error')
                }

            });}
    </script>
@stop
