<!doctype html>
<html lang="en" >
<head>
@php
    $seo=App\SeoFixedPage::find(1);
    $os = request()->header()['user-agent'][0];
    if (strpos($os, 'Android') !== false) {
        $device = 'android';
    } else if(strpos($os, 'iPhone') !== false) {
        $device = 'iphone';
    } else {
        $device = 'desktop';
    }
@endphp
<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="{{loadAsset('/backend/website/pic/icon/tab_icon.png')}}"/>
    <!------------------------------------------------Start SEO------------------------------------------------------->
    <title>@yield('title', $seo['page_title_'.app()->getLocale()])</title>
    <meta name="description" content="@yield('description', $seo['meta_description_'.app()->getLocale()])"/>
    <meta name="keywords" content="@yield('keywords', $seo['meta_keywords_'.app()->getLocale()])"/>
    <meta name="copyright" content="{{ config('app.name') }}">
    <meta name="author" content="{{ config('app.name') }}"/>
    <meta name="application-name" content="@yield('title', config('app.name'))">
    @if(app()->getLocale()=='en')
        <link rel="canonical" href="{{url()->current()}}" hreflang="en-eg">
        <link rel="alternate" href="{{str_replace('/en/','/ar/',url()->current())}}" hreflang="ar-eg" />
    @else
        <link rel="canonical" href="{{url()->current()}}" hreflang="ar-eg">
        <link rel="alternate" href="{{str_replace('/ar/','/en/',url()->current())}}" hreflang="en-eg" />
    @endif
<!--GEO Tags-->
    <meta name="DC.title" content="@yield('title', config('app.name'))"/>
    <meta name="geo.region" content="EG-C"/>
    <meta name="geo.placename" content="@yield('city', 'Cairo')"/>
    <meta name="geo.position" content="@yield('map_s', '30.097496;31.315341')"/>
    <meta name="ICBM" content="@yield('map', '30.097496, 31.315341')"/>
    <!--Facebook Tags-->
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:type" content="@yield('social.type','website')"/>
    <meta property="og:url" content="{{ request()->fullUrl() }}"/>
    <meta property="og:title" content="@yield('social.title', config('app.name'))"/>
    <meta property="og:description" content="@yield('social.description',$seo['og_description'])"/>
    <meta property="og:image" content="@yield('social.image',url('backend/website/pic/easySchools.png'))"/>
    <meta property="article:author" content="https://www.easyschools.org"/>

    <meta property="og:image:secure_url" content="@yield('social.image',url('backend/website/pic/easySchools.png'))" />
    {{--<meta property="og:image:type" content="image/jpeg" />--}}
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image:alt" content="@yield('social.title', config('app.name'))" />
    <!-- facebook for ios -->
    {{--<meta property="al:ios:app_store_id" content="342792525" />
    <meta property="al:ios:url" content="imdb://title/tt0117500" />
    <meta property="al:ios:app_name" content="IMDb Movies & TV" />--}}
<!-- facebook for android -->
    <meta property="al:android:package" content="com.easyschool.easyschoolwebsite" />
    <meta property="al:android:url" content="android-app:" />
    <meta property="al:android:app_name" content="easyschools" />

    @if(app()->getLocale()=='en')
        <meta property="og:locale" content="en_UK"/>
        <meta property="og:locale:alternate" content="ar_AR" />
    @else
        <meta property="og:locale" content="ar"/>
        <meta property="og:locale:alternate" content="en_EN" />
@endif

<!--Twitter Tags-->
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="@yield('social.title', config('app.name'))"/>
    <meta name="twitter:description" content="@yield('social.description', $seo['og_description'])"/>
    <meta name="twitter:image" content="@yield('social.image',url('backend/website/pic/easyschools.png'))"/>
    <!------------------------------------------------End SEO------------------------------------------------------->

    <!-- Font-Awesome CSS -->
    <link href="{{loadAsset('backend/website/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!-- Style Files -->
    <link href="{{loadAsset('backend/website/css/newHStyle.css')}}" rel="stylesheet"/>
{{--
    <link href="{{loadAsset('backend/website/css/style.css')}}" rel="stylesheet"/>
--}}
{{--
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
--}}
@yield('css')

<!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a954537db7a012a"></script>
    <!-- google plus like Tag Manager -->

</head>

<body>

<div id="overlay" class="close-sid-menue" onclick="off()">
</div>


<!-- ======== start sidebar menue ============-->
<p  style="border: none" class="close-sid-menue">x</p>
<div class="sid-menue-r-nav-bar">

    <a href="/" class="center-block image_side_logo"><img src="{{ loadAsset('uploads/'. App\FixedImage::find(1)->image)}}" alt="EasySchools-logo"></a>

    <p><a href="/{{app()->getLocale()}}">{{ trans('messages.main') }}</a></p>
    <p><a href="{{route('info',['lang'=>app()->getLocale()])}}">{{ trans('messages.about') }}</a></p>
    <p><a href="{{route('partners',['lang'=>app()->getLocale()])}}">{{ trans('messages.partners') }}</a></p>
    <p><a href="{{route('schools',['lang'=>app()->getLocale()])}}">{{ trans('messages.schools') }}</a></p>
    <p><a href="{{route('solutions',['lang'=>app()->getLocale()])}}">{{ trans('messages.solutions   ') }}</a></p>
    <p><a href="{{route('info',['lang'=>app()->getLocale()])}}">{{ trans('messages.contact') }}</a></p>
    <p><a href="{{route('articles',['lang'=>app()->getLocale()])}}">{{ trans('messages.articles') }}</a></p>
    @if(!Auth::user())

    @else
        <p><a href="{{route('login',['lang'=>app()->getLocale()])}}">{{ trans('messages.login') }}</a></p>
        <li class="user-img"><a href="#"><img src="{{loadAsset('backend/website/user.png')}}" alt="EasySchools-userImage">abdo</a>
            <ul class="bad" >
                <li><a href="#">Requests</a></li>
                <li><a href="#">Favourite</a></li>
                <li><a href="#">Compare</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </li>
        <p><a href="{{route('register',['lang'=>app()->getLocale()])}}">{{ trans('messages.register') }}</a></p>
    @endif
    <div class="tit-adv-s-sid hidden-md">
        <a>{{ trans('messages.advSearch') }}</a>
    </div>
    <form action="{{route('advSearch',['lang'=>app()->getLocale()])}}" method="get">
        <div class="s-box-filter"><!-- start filter box -->
            <h5 id="abdo">City</h5>
            <select id="city_id" name="city" class="selector" >
                <option value="0" disabled selected>{{trans('messages.select')}}</option>
                @foreach(App\City::all() as $city)
                    <option value="{{$city['slug_'.app()->getLocale() ]}}">{{$city['name_'.app()->getLocale()]}}</option>
                @endforeach
            </select>

        </div><!-- start filter box -->

        <div class="s-box-filter"><!-- start filter box -->
            <h5 id="abdo">District</h5>
            <select id="district_id" name="district" class="selector" >
                <option value="0">{{trans('messages.select')}}</option>

            </select>

        </div><!-- start filter box -->


        @foreach(\App\FacilityType::all() as $key=>$type)

            <div class="s-box-filter"><!-- start filter box -->
                <h5 id="abdo">{{$type['name_'.app()->getLocale()]}}</h5>
                <p class="drop-filter-adv"><span style="text-align: center">Select</span> <span class="fa fa-angle-down" style="float: right"></span></p>
                <div id="dropdown-adv-fil">
                    @foreach(App\FacilityValue::where('facility_type_id',$type->id)->get() as $k=>$value)
                        <p><label class="dropdown-option">
                                <input type="checkbox" name="dropdown-group" value="{{$value->id}}">
                                {{$value['name_'.app()->getLocale()]}}
                            </label>
                        </p>
                    @endforeach


                </div>
            </div><!-- start filter box -->

        @endforeach


        <div class="col-md-12 price-slider side-men-nav-bar">
            <div class="col-md-12 text-center">
                <h4>Range pricing <small>(EG)</small></h4>
            </div>
            <section class="range-slider container">
                <span class="output outputOne" style="left: 0.0004%;">1</span>
                <span class="output outputTwo" style="left: 100%;">250000</span>
                <span class="full-range"></span>
                <span class="incl-range" style="width: 99.9996%; left: 0.0004%;"></span>
                <input name="rangeOne" value="1" min="1" max="250000" step="1" type="range">
                <input name="rangeTwo" value="250000" min="1" max="250000" step="1" type="range">
            </section>
        </div>

        <div class="sub-sid-me col-md-12 text-center">
            <button  type="submit" class="pull-right">search</button>
        </div>
    </form>

</div>


<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header ">
            <button type="button" class="navbar-toggle collapsed side-bar-men icon icon" onclick="on()"  data-toggle="collapse"  aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{{ loadAsset('uploads/'. App\FixedImage::find(1)->image)}}" alt='EasySchools-logo'></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="/{{app()->getLocale()}}">{{ trans('messages.main') }}</a></li>
                <li><a href="{{route('info',['lang'=>app()->getLocale()])}}">{{ trans('messages.about') }}</a></li>
                <li><a href="{{route('partners',['lang'=>app()->getLocale()])}}">{{ trans('messages.partners') }}</a></li>
                <li><a href="{{route('schools',['lang'=>app()->getLocale()])}}">{{ trans('messages.schools') }}</a></li>
                <li><a href="{{route('community',['lang'=>app()->getLocale()])}}">{{ trans('messages.community') }}</a></li>
                <li><a href="{{route('solutions',['lang'=>app()->getLocale()])}}">{{ trans('messages.solutions') }}</a></li>
                <li><a href="{{route('info',['lang'=>app()->getLocale()])}}">{{ trans('messages.contact') }}</a></li>
                <li><a href="{{route('articles',['lang'=>app()->getLocale()])}}">{{ trans('messages.articles') }}</a></li>
                @if(Auth::user())
                    <li class="user-img"><a><img src="{{loadAsset('/backend/website/user.png')}}" alt='EasySchools-userImage'></a>
                        <ul class="bad">
                            <li><a href="#">{{ trans('messages.requests') }}</a></li>
                            <li><a  href="{{route('favorites',['lang'=>app()->getLocale()])}}">{{ trans('messages.favourites') }}</a></li>
                            <li><a  href="{{route('compare',['lang'=>app()->getLocale()])}}">{{ trans('messages.compareNav') }}</a></li>
                            <li><a  href="{{route('profile',['lang'=>app()->getLocale()])}}">{{ trans('messages.profile') }}</a></li>
                            <li><a  href="{{route('logout',['lang'=>app()->getLocale()])}}">{{ trans('messages.logout') }}</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{route('login',['lang'=>app()->getLocale()])}}">{{ trans('messages.login') }}</a></li>
                    <li><a class="sign-up" href="{{route('register',['lang'=>app()->getLocale()])}}">{{ trans('messages.register') }}</a></li>
                @endif
                <li class="lang-img">
                    @if(app()->getLocale() == 'ar')
                        @if(url()->current() == 'https://easyschools.org/ar')
                            <a href="{{ str_replace('/ar','/en',url()->current())}}"><img alt="Easy-schools language" alt="EasySchools-languageFlag" style="width: 30px; height: 20px" src="{{loadAsset('/backend/website/pic/lang/us.png')}}"></a>
                        @else
                            <a href="{{ str_replace('/ar/','/en/',url()->current())}}"><img alt="Easy-schools language" alt="EasySchools-languageFlag" style="width: 30px; height: 20px" src="{{loadAsset('/backend/website/pic/lang/us.png')}}"></a>
                        @endif
                    @else
                        @if(url()->current() == 'https://easyschools.org/en')
                        <a href="{{ str_replace('/en','/ar',url()->current())}}"><img alt="Easy-schools language" alt="EasySchools-languageFlag" style="width: 30px; height: 20px" src="{{loadAsset('/backend/website/pic/lang/eg.png')}}"></a>
                        @else
                        <a href="{{ str_replace('/en/','/ar/',url()->current())}}"><img alt="Easy-schools language" alt="EasySchools-languageFlag" style="width: 30px; height: 20px" src="{{loadAsset('/backend/website/pic/lang/eg.png')}}"></a>
                        @endif
                    @endif
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<!-- ============================================== start section Content ================================================== -->


<!-- Go to www.addthis.com/dashboard to customize your tools -->
@yield('content')
<!-- Floating Button -->
<div class="col-xs-12 text-center faded">
    @if($device =='android')
        <p class="floating"><a href="https://play.google.com/store/apps/details?id=com.easyschool.easyschoolwebsite&hl=en" class="openTheApp">Open in App</a> &nbsp; | &nbsp; <a class="closeTheButton">X</a></p>
    @elseif($device == 'iphone')
        <p class="floating"><a href="https://itunes.apple.com/gb/app/easyschools/id1344484011?mt=8" class="openTheApp">Open in App</a> &nbsp; | &nbsp; <a class="closeTheButton">X</a></p>
    @endif
</div>
<!-- Floating Button -->
<!-- ============================================== start section social media ================================================== -->

<div id="socialarea" class="addthis_inline_follow_toolbox"></div>

<style>
    .addthis-animated {
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        animation-timing-function: ease-out;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
        position: absolute;
        top: 70px;
        position: fixed;
        float: left;
    }
</style>

<!-- ============================================== start section footer ================================================== -->
<section id="contact-us" class="school-footer ">
    <div class="container">


        <div class="col-sm-4 col-xs-12  logo text-center sec">
            <img src="{{ loadAsset('backend/website/pic/footer/footerLogo.png')}}" alt="EasySchool-logo">
            <div class="col-xs-12  fot-info">
                <div class="col-xs-12  left-loc"><h5 class=""><i class="fa fa-location-arrow"></i> 3 AL-ANDALUS STREET, HELIOPOLIS, CAIRO, EGYPT</h5></div>
                <div class="col-xs-12  right-msg"><h5 class=""><i class="fa fa-envelope"></i> CONTACT@EASYSCHOOLS.ORG</h5></div>
            </div>
        </div>


        <div class="col-sm-4 col-xs-12  fot-info fot-info-m sec text-center" style="text-transform: uppercase">
            <p><a href="{{route('info',['lang'=>app()->getLocale()])}}">{{trans('messages.about')}}</a></p>
            <p><a href="{{route('partners',['lang'=>app()->getLocale()])}}">{{trans('messages.partners')}}</a></p>
            <p><a href="{{route('schools',['lang'=>app()->getLocale()])}}">{{trans('messages.schools')}}</a></p>
            <p><a href="{{route('info',['lang'=>app()->getLocale()])}}">{{trans('messages.contact')}}</a></p>
            <!--<p></p>-->
        </div>


        <div class="col-sm-4 col-xs-12 fot-info-r list-under-footer sec text-center">
            <p><a href="{{route('privacy',['lang'=>app()->getLocale()])}}">{{trans('messages.privacy')}}</a></p>
            <p><a href="{{route('partnerAgreement',['lang'=>app()->getLocale()])}}">{{trans('messages.agreement')}}</a></p>

            <p><a href="{{route('termsAndConditions',['lang'=>app()->getLocale()])}}">{{trans('messages.terms')}}</a></p>
            <p class="sec">{{trans('messages.available_at')}}</p>
            <a href="https://play.google.com/store/apps/details?id=com.easyschool.easyschoolwebsite"><img src="{{loadAsset('backend/website/pic/footer/Artboard 8.png')}}" alt="EasySchools-AndroidApp"></a>
            <a href="https://itunes.apple.com/gb/app/easyschools/id1344484011?mt=8&ign-mpt=uo%3D2"><img src="{{loadAsset('backend/website/pic/footer/Artboard 9.png')}}" alt="EasySchools-IOSApp"></a>
        </div>
    </div><!-- container -->
</section>







<!--  Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{--
<script src="{{loadAsset('backend/website//js/bootstrap.min.js')}}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
--}}
{{--<script src="{{loadAsset('/backend/website/js/pricefilter-schools.js')}}"></script>--}}
<script src="{{loadAsset('/backend/website/js/newHScript.js')}}"></script>
<script src="{{loadAsset('/backend/website/js/pricefilter-schools.js')}}"></script>
@yield('script')
<script>
    /*    $(document).on('click', '.data', function () {
            var liValue = $(this).attr('ourValue');
            alert(liValue)
        })*/
    $('.closeTheButton').click(function(){
        $('.faded').fadeOut();
    });
</script>
<script>
    $('#search').on('keyup',function(){
        $value=$(this).val();
        $.ajax({
            type : 'get',
            url:"{{ url('/'.app()->getLocale()) }}/schools/autoCompleteSearch",
            data:{'search':$value},
            success:function(data){
                $('#app').html(data);
                $('.data').click(function () {

                    $(document).on('click', '.data', function () {
                        var liValue = $(this).attr('ourValue');
                        $('#search').val(liValue);
                        $('#formSearch').submit();
                    })
                })
            }
        });
    })
</script>
<script type="text/javascript">

    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>
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
<script>
    $(document).on('change','#city_idR',function () {
        var slug = $(this).val();
        var _token = '{{ csrf_token() }}';
        $.ajax({
            url:'{{ route('districts',['lang'=>app()->getLocale()]) }}',
            type:'get',
            dataType:'html',
            data: {slug:slug,_token:_token},
            success:function (data) {
                $("#district_idR").html(data)
            }
        })
    })
</script>

</body>
</html>