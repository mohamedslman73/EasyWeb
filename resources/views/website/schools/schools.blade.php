@extends("layouts.app")
@section('description'){{@$seo['meta_description_'.app()->getLocale()]}} @endsection
@if(@$cityName)
    @if(app()->getLocale()=='en')
@section('description'){{str_replace('cairo', $cityName , $seo['meta_description_'.app()->getLocale()])}} @endsection
@section('keywords'){{$cityName ."،". str_replace(', ',', '.$cityName.' ' , $seo['meta_keywords_'.app()->getLocale()])}} @endsection
@else
@section('description'){{str_replace('القاهرة',$cityName, $seo['meta_description_'.app()->getLocale()])}} @endsection
@section('keywords'){{$cityName ."،". str_replace('، ',' '.$cityName.'، ' , $seo['meta_keywords_'.app()->getLocale()])}} @endsection
@endif
@else
@section('description'){{@$seo['meta_description_'.app()->getLocale()]}} @endsection
@section('keywords'){{@$seo['meta_keywords_'.app()->getLocale()]}} @endsection
@endif
@section('social.title') EasySchools | {{@$seo->title}} @endsection
@section('social.description'){{@$seo['social_description']}} @endsection
@section('social.image') {{loadAsset('/backend/website/social.png')}} @endsection

@section('css')

    <link href="{{loadAsset('/backend/website/css/schoolsStyle.css')}}" rel="stylesheet"/>
@endsection


@section('content')
    <div class="container">
        <!-- ********* cont-home ********** -->
        <section class="cont-home" style="background: url('{{loadAsset('/backend/website/pic/communityBG.jpg')}}') center ;     background-size: cover">
            <div class="container text-center">
                <div class="row">
                    <h2>WELCOME TO THE BIGGEST SCHOOLS  </h2>
                    <h2>PLATFORM</h2>
                    <div class="col-md-12">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <form id="formSearch" autocomplete="off" action="{{route('search',['lang'=>app()->getLocale()])}}" method="get">
                                    <input class="text-center inpu-se-sch" id="search" type="text" on name="search" placeholder="{{ trans('messages.find_your_school') }}">
                                </form>
                                {{--<th>Product Name</th>--}}
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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

                    <div class="col-xs-12" id="ad_up" style="margin:10px">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-5518639241625534" data-ad-slot="8503149470"></ins>
                        <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
                    </div>


                </div><!-- row -->
            </div><!-- container -->
        </section>



        <div class="all-schools-main-page col-md-12 wrapper"><!-- all schools -->
            @if (session()->has('massage'))
                <div class="alert alert-danger">
                    <h3>{!! session()->get('massage') !!}</h3>
                </div>
            @endif
            @php
                $i = 1;
            @endphp
            @foreach($schools as $school)
                @if($i != 5)

                    <div class="col-sm-6 col-md-4">
                        <div class="schools-cont-cor" style="overflow: hidden" data-item-id="1">
                            <div class="color-1">
                                <img src="{{$school->logo}}" id="schoolImageSize" alt="EasySchool-{{$school['name_'.app()->getLocale()]}}-logo" class="img-responsive center-block im-box-a-sch">
                            </div>
                            @if(Auth::user())
                                <div class="">
                                    <button type="button" style="display: none;" id="compare" value="{{$school->id}}" class="btn btn-circle btn-labny btn-lg popup-web compare" data-toggle="tooltip" title="Compare"> <i class="fa fa-exchange fa-2x"></i> </button>
                                    <button type="button" style="display: none;" id="exitCompare" value="{{$school->id}}" class="btn btn-circle btn-labny btn-lg popup-web exitCompare" data-toggle="tooltip" title="Compare"> <i class="fa fa-times fa-2x"></i> </button>
                                </div>
                                <?php echo renderFavorite($school->id); ?>
                            @endif
                            <p class="school-name"><a href="{{route('schoolProfile',['slug'=>$school['slug_'.app()->getLocale()],'lang'=>app()->getLocale()])}}">{{$school['name_'.app()->getLocale()]}}</a></p>
                            <p class="clas-dif comment" >{{$school['about_'.app()->getLocale()]}}</p>
                        </div>
                    </div>
                @elseif($i ==5)
                    <div class="col-sm-6 col-md-4">
                        <div class="schools-cont-cor" style="overflow: hidden" data-item-id="1">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle"
                                 style="display:block; text-align:center;"
                                 data-ad-layout="in-article"
                                 data-ad-format="fluid"
                                 data-ad-client="ca-pub-5518639241625534"
                                 data-ad-slot="6247277951"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>

                @endif
                @php $i++ @endphp
            @endforeach

            <div class="col-xs-12" id="ad_up" style="margin-top:40px">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-5518639241625534" data-ad-slot="8503149470"></ins>
                <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
            </div>

        </div><!-- start all schools -->

        <div class="col-md-12">
            <div  class="col-md-offset-3 col-md-6">{{ $schools->links() }}</div>
        </div>


    </div>




@stop
@section('script')
    <script>
        $(document).on('change','#city_id',function () {
            var slug = $(this).val();
            var _token = '{{ csrf_token() }}';
            $.ajax({
                url:'{{ route('districts',['lang'=>app()->getLocale()]) }}',
                type:'get',
                dataType:'html',
                data: {slug:slug,_token:_token},
                success:function (data) {
                    $("#district_id").html(data)
                }
            })
        })
    </script>
    <script src="{{loadAsset('backend/website/js/pricefilter-schools.js')}}" ></script>
    <script>

        var schools=[];
        $(document).on('click','#compare',function() {
            var school = $(this).val();
            schools.push(school);
            var status='Added to compare';
            ajaxCall(schools,school,status);
        });
        $(document).on('click','#exitCompare',function() {
            var school = $(this).val();
            var status='Deleted from compare';
            var index=schools.indexOf(school);
            if (index >= 0) {
                schools.splice( index, 1 );
            }
            ajaxCall(schools,school,status);
        });

        function ajaxCall(schools,school,status) {
            $.ajax({
                type:'get',
                url:"{{ route('addCompare',['lang'=>app()->getLocale()]) }}",
                dataType:'json',
                data:{school:school
                    ,schools:schools},
                success:function(data) {
                    alert(status)
                },error:function() {
                    alert('error')
                }

            });}
    </script>

@endsection
