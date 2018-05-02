@extends('layouts.app')
@section('title')
    Solutions
@endsection
@if($seo!=null)
@section('title') EasySchools | {{$seo->title}} @endsection
@section('description'){{$seo['meta_description_'.app()->getLocale()]}} @endsection
@section('keywords'){{$seo['meta_keywords_'.app()->getLocale()]}} @endsection
@section('social.title') EasySchools | {{$seo->title}} @endsection
@section('social.description'){{$seo['social_description']}} @endsection
@section('social.image') {{loadAsset('/backend/website/social.png')}} @endsection
@endif
@section('css')
    @if(app()->getLocale()=='en')
    <link href="{{loadAsset('/backend/website/css/solutionsStyle.css')}}" rel="stylesheet"/>
    @else
    <link href="{{loadAsset('/backend/website/css/arabicSolutionStyle.css')}}" rel="stylesheet"/>
    @endif
@endsection
@section('content')
    @if(session('message'))
        <div id="myModal" class="modal fade text-center" style="margin-top: 100px;" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>{{ session('message') }}</h3>
                    </div>
                </div>

            </div>
        </div>
    @endif
   <!-- ============ start slider ============ -->
    <section id="header" >
        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 10%">
                    <h2>{{trans('messages.welcome')}}</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h3>{{trans('messages.ourCore')}}</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: -4%">
                    <button class="requestDemo">{{trans('messages.requestDemo')}}</button>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ end slider ============ -->

    <!-- hr -->
    <section>
        <div class="hr text-center">
            <span>{{trans('messages.benefits')}}</span>
        </div>
    </section>
    <!-- hr -->
    <!-- ============ start benifits ============ -->
    <section class="benifits">
        <div class="container">
            <div class="row">
                <!-- benifit 1 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="border">
                        <img src="{{url('/')}}/backend/website/images/assests/Layer16.png" />
                        <h4>{{trans('messages.convenience')}}</h4>
                        <p>{{$textContent['convenience']}}</p>
                    </div>
                </div><!-- .col -->
                <!-- benifit 1 -->

                <!-- benifit 2 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="border">
                        <img src="{{url('/')}}/backend/website/images/assests/Layer15.png" />
                        <h4>{{trans('messages.accuracy')}}</h4>
                        <p>{{$textContent['accuracy']}}</p>
                    </div><!-- .border -->
                </div><!-- .col -->
                <!-- benifit 2 -->

                <!-- benifit 3 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="border">
                        <img src="{{url('/')}}/backend/website/images/assests/Layer14.png" />
                        <h4>{{trans('messages.collaborating')}}</h4>
                        <p>{{$textContent['collaborating']}}</p>
                    </div><!-- .border -->
                </div><!-- .col -->
                <!-- benifit 3 -->

                <!-- benifit 4 -->
                <div class="col-md-3 col-xs-6 text-center">
                    <div class="border">
                        <img src="{{url('/')}}/backend/website/images/assests/Layer19.png" />
                        <h4>{{trans('messages.transparency')}}</h4>
                        <p>{{$textContent['transparency']}}</p>
                    </div><!-- .border -->
                </div><!-- .col -->
                <!-- benifit 4 -->


            </div><!-- .row -->
        </div><!-- .container -->
    </section>
    <!-- ============ end benifits ============ -->

    <!-- hr -->
    <div class="hr text-center">
        <span>{{trans('messages.features')}}</span>
    </div>
    <!-- hr -->

    <!-- ============ start features ============ -->
    <section class="features">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-7 col-xs-7 feat-parent">
                    <div class="col-md-1 col-xs-1 feat-child-1">
                        <button class="b1 t1 active">{{trans('messages.admin')}}</button>
                    </div>
                    <div class="col-md-1 col-xs-1 feat-child-2">
                        <button class="b1 t2">{{trans('messages.learning')}}</button>
                    </div>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->

        <!-- tab 1 -->
        <div class="container t3">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group434.png" />
                                <h4>{{trans('messages.library')}}</h4>
                            </div>
                            <p>{{$textContent['library']}}</p>
                        </div><!-- .wrapper -->
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group436.png" />
                                <h4>{{trans('messages.humanResources')}}</h4>
                            </div>
                            <p>{{$textContent['human_resources']}}</p>
                        </div><!-- .wrapper -->
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group439.png" />
                                <h4>{{trans('messages.inventory')}}</h4>
                            </div><!-- .inline-fix -->
                            <div>
                                <p>{{$textContent['inventory']}}</p>
                            </div>
                        </div><!-- .wrapper -->
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group508.png" />
                                <h4>{{trans('messages.reportSystem')}}</h4>
                            </div><!-- .inline-fix -->
                            <p>{{$textContent['report_system']}}</p>
                        </div><!-- .wrapper -->
                    </div>
                </div><!-- .col -->

                <div class="col-md-12">
                    <div class="col-md-3 col-md-offset-2 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group513.png" />
                                <h4>{{trans('messages.transport')}}</h4>
                            </div><!-- .inline-fix -->
                            <p>{{$textContent['transport']}}</p>
                        </div><!-- .wrapper -->
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group511.png" />
                                <h4>{{trans('messages.finance')}}</h4>
                            </div><!-- .inline-fix -->
                            <p>{{$textContent['finance']}}</p>
                        </div><!-- .wrapper -->
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <div class="wrapper">
                            <div class="inline-fix">
                                <img src="{{url('/')}}/backend/website/images/assests/Group512.png" />
                                <h4>{{trans('messages.cafe')}}</h4>
                            </div><!-- .inline-fix -->
                            <p>{{$textContent['cafe']}}</p>
                        </div><!-- .wrapper -->
                    </div>
                </div>

            </div><!-- .row -->
        </div><!-- .container -->

        <!-- tab 2 -->
        <div class="container t4 change">
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group519.png" />
                            <h4>{{trans('messages.attendance')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['attendance']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group523.png" />
                            <h4>{{trans('messages.schoolMaterial')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['school_material']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group525.png" />
                            <h4>{{trans('messages.homework')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['homework']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group526.png" />
                            <h4>{{trans('messages.schedule')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['schedule']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group549.png" />
                            <h4>{{trans('messages.registrationSystem')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['registration_system']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group552.png" />
                            <h4>{{trans('messages.messagingSystem')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['messaging_system']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group553.png" />
                            <h4>{{trans('messages.grades')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['grades']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group556.png" />
                            <h4>{{trans('messages.certificates')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['certificates']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group563.png" />
                            <h4>{{trans('messages.notificationSystem')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['notification_system']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group559.png" />
                            <h4>{{trans('messages.quizzesOnline')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['quizzes_online']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Path330.png" />
                            <h4>{{trans('messages.schoolCalender')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['school_calender']}}</p>
                    </div><!-- .wrapper -->
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="wrapper">
                        <div class="inline-fix">
                            <img src="{{url('/')}}/backend/website/images/assests/Group557.png" />
                            <h4>{{trans('messages.sms')}}</h4>
                        </div><!-- .inline-fix -->
                        <p>{{$textContent['sms']}}</p>
                    </div><!-- .wrapper -->
                </div>

            </div><!-- .row -->
        </div><!-- .container -->

    </section><!-- .features -->
    <!-- ============ end features ============ -->

    <!-- hr -->
    <div class="hr text-center" id="requestDemo">
        <span>{{trans('messages.requestDemo')}}</span>
    </div>
    <!-- hr -->

    <!-- ============ start demo ============ -->
    <section class="demo">
        <div class="container">
            <div class="row">

                <div class="col-md-10 col-md-offset-1 demoborder text-left">
                    <form  action="{{  route('solutions',['lang'=>app()->getLocale()]) }}" method="post">
                        {{csrf_field()}}
                        <div class="col-md-6">
                            <input type="text" name="name" placeholder="{{trans('messages.name')}}"/>
                            <input type="tel"  name="phone" placeholder="{{trans('messages.phone')}}" />
                            <input type="text" name="school_name" placeholder="{{trans('messages.schoolName')}}"/>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="{{trans('messages.email')}}" />
                            <input type="text" name="school_website" placeholder="{{trans('messages.schoolWebsite')}}"/>
                            <input type="text" name="school_city" placeholder="{{trans('messages.schoolCity')}}"/>
                        </div>
                        <div class="col-md-12">
                            <textarea placeholder="{{trans('messages.comments')}}" name="comment"></textarea>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-default btn-com-pop">{{trans('messages.accept')}}</button>
                        </div>
                    </form>
                </div><!-- .col -->


            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .demo -->
    <!-- ============ end demo ============ -->


@endsection
@section('script')
    @if (session('message'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#myModal').modal('show');
            });

        </script>
    @endif
    <script>
    $(document).ready(function(){
    $('.requestDemo').click(function() {
    $('html, body').animate({
    scrollTop: $('#requestDemo').offset().top
    }, 1000);
    });

    $('.b1').click(function(){
    $('.b1').removeClass('active');
    $(this).addClass('active');
    });

    $('.t1').click(function(){
    $('.t3').removeClass('change');
    $('.t4').addClass('change');
    });

    $('.t2').click(function(){
    $('.t4').removeClass('change');
    $('.t3').addClass('change');
    });
    });
    </script>
@endsection