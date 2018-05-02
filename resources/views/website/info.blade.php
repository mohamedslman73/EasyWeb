@extends("layouts.app")
@section('css')
    <!-- Schools CSS -->
    <link href="{{loadAsset('backend/website/css/mainStyle.css')}}" rel="stylesheet"/>
    <style>
        .testmonials {
            background: url({{@loadAsset('/uploads/'.App\FixedImage::find(7)->image)}}) center no-repeat fixed;
            background-size: cover;
            color: #fff;
            position: relative;
            margin-top: 35px;
        }

        .testmonials .screen-on-partners{
            background-color: rgba(23, 24, 25, 0.71);
            padding: 50px 0;
        }
        .home-school-abdo{
            background: url('{{@loadAsset('/uploads/'.App\FixedImage::find(2)->image)}}')  center fixed no-repeat;
            width: 100%;
            min-height: 300px;
            padding-bottom: 0px;
            -webkit-background-size: cover;
            -Moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            border-bottom: 4px #053460 solid;
        }
        .school-footer{
            background: url('{{loadAsset('backend/website/pic/footer/footertexture.png')}}')  center  no-repeat;
            width: 100%;
            min-height: 120px;
            -webkit-background-size: cover;
            -Moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            border-top: 4px solid #054360;
            color: #054360;
            font-weight: bold;
            padding: 20px 0;
        }

    </style>
    <style>
        .dropdownMenu2 li a {
            color: white;
        }
        .dropdownMenu2 li a:hover {
            background-color: #122b40;
            color: white;

        }

        .user-iconsmal-up {
            display: none;
        }

        @media (max-width: 1035px) {
            .user-iconsmal-up{
                display: block;
            }
        }

    </style>
@endsection
@section('schoolsLink')
    <a href="{{route('schools',['lang'=>app()->getLocale()])}}"><button class="slogan-button-schools">{{ trans('messages.explore_schools') }}</button></a>
@endsection

@section('content')


    <!--========================== sTART SECTION WHO WE ARE ========================-->
<section class="who-we-are">
    <div class="container">
        <div class="row text-center">

            <div class="col-md-4 col-sm-12 who">
                <div class="left ">
                    <div class="icon-img"><img src="{{loadAsset('backend/website/pic/who/whoweare.png')}}" alt="EasySchools-about"></div>
                    <p class="head1"> {{ trans('messages.who_we_are') }}</p>
                    <p>
                        {{$textContent['who_we_are']}}
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 who">
                <div class="middle">
                    <div class="icon-img"><img src="{{loadAsset('backend/website/pic/who/mission.png')}}" alt="EasySchools-mission"></div>
                    <p class="head2">{{ trans('messages.mission') }}</p>
                    <p>
                        {{$textContent['mission']}}
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 who">
                <div class="right ">
                    <div class="icon-img"><img src="{{loadAsset('backend/website/pic/who/vision.png')}}" alt="EasySchools-about"></div>
                    <p class="head1">{{ trans('messages.vision') }}</p>
                    <p>
                        {{$textContent['vision']}}
                    </p>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- container -->
</section>

<!--========================== sTART SECTION ABOUT US ========================-->
<section id="about" class="about-us">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 left">
                <!--<span class="about-head">ABOUT US</span>-->
                <div class="col-md-12 about-head">
                    <div class="col-md-12 schols-line-head">
                        <p class="scols-line">{{ trans('messages.about') }}<img src="{{loadAsset('backend/website/pic/main/line2.png')}}" alt="EasySchools-about"></p>
                    </div>
                    <!--<p class="scols-line">SCHOOLS<img src="pic/schools/line2.png"></p>-->
                </div>
                <P class="about-baragraph">
                    {{$textContent['about']}}
                </P>

                <!--<button class="about-button">MORE</button>-->
            </div>

            <div class=" col-md-4 right hidden-sm hidden-xs">
                <img class="img-responsive" src="{{loadAsset('/uploads/'.$images['3'])}}" alt="EasySchools-about">
            </div>

        </div><!-- row -->
    </div><!-- container -->
</section>




@stop
