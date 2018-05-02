@extends("layouts.app")


@section('upperSlogan')
    {{trans('messages.school_profile')}}
@endsection

@section('title') EasySchools | {{$schools['name_'.app()->getLocale()]}} @endsection
@if(app()->getLocale()=='en')
@section('description') {{str_replace('school',$schools['name_'.app()->getLocale()],$seo['meta_description_'.app()->getLocale()])}} @endsection
@section('keywords'){{$schools['name_'.app()->getLocale()]}} {{str_replace(', ',', '.$schools['name_'.app()->getLocale()].' ', $seo['meta_keywords_'.app()->getLocale()])}} @endsection
@else
@section('description') {{str_replace('مدرسه',$schools['name_'.app()->getLocale()],$seo['meta_description_'.app()->getLocale()])}} @endsection
@section('keywords'){{$schools['name_'.app()->getLocale()]}}, {{$schools['name_'.app()->getLocale()].' '.str_replace('، ','، '.$schools['name_'.app()->getLocale()].' ', $seo['meta_keywords_'.app()->getLocale()])}} @endsection
@endif
@section('city') {{$city}} @endsection
@section('map_s') {{$schools->longitude.';'.$schools->latitude}} @endsection
@section('map') {{$schools->longitude.', '.$schools->latitude}} @endsection
@section('social.title') {{$schools['name_'.app()->getLocale()]}} @endsection
@section('social.description') {{$schools['name_'.app()->getLocale()]}} {{$seo['og_description']}} @endsection
@section('social.image') {{asset($schools->logo)}} @endsection
@section('css')
    <link href="{{ loadAsset('backend/website/css/profileSchoolStyle.css') }}" rel="stylesheet"/>

@endsection
@section('script')
    <script src="{{ loadAsset('backend/website/js/schoolProfileScript.js') }}"></script>

    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "School name",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue" : "5.0",
    "ratingCount": "100",
    "reviewCount": "1000"
  }
}
</script>

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "School",
  "name": "{{$schools->name_en}}",
  "url": "https://www.easyschools.org/en/schoolProfile/malvern-college",
  "logo": "{{$schools->logo}}",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "{{$city}}",
    "streetAddress": "{{$schools->address_en}}",
    "addressCountry": "EG"
  },
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+2{{$schools->phone}}",
    "contactType": "customer service",
    "areaServed": "EG",
    "availableLanguage": ["English","Arabic"]
  },
  "sameAs": [
    "{{$schools->website}}",
    "{{$schools->facebook}}",
    "{{$schools->googleplus}}",
    "{{$schools->linkedin}}",
    "{{$schools->instagram}}",
    "{{$schools->youtube}}"
  ]
}
</script>
@endsection
@section('content')
    <section class="home-profile-school">
        <div class="container">
            <div class="row" style="margin-top:10%;">
                <div class="col-xs-12" style="margin:70px 0">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-5518639241625534"
                         data-ad-slot="3924495191"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
            </div>
            <div class="col-md-6 pr-scho"><!-- first col-6 -->
                <div class="logo-box">
                    <img class="cor-pro" src="{{asset($schools->logo)}}" alt="EasySchools-{{$schools['name_'.App::getLocale()]}}-logo">
                </div>
                <p class="para-name-sch">
                    @if(!Auth::check())
                        <span class="paransch"> {{$schools['name_'.App::getLocale()]}} </span>
                        <i class="fa fa-star colors" onclick="alert('Please, Login to rate this schools');"></i>
                        {{ $schools->Rate() }}
                    @endif
                    @if(Auth::check())
                        <span class="paransch"> {{$schools['name_'.App::getLocale()]}} </span><i class="fa fa-star colors"></i><span class="fa-2x">{{ $schools->Rate() }}
                            <form  action="{{route('rate',['lang'=>app()->getLocale()])}}" method="post">
                            <fieldset class="rating">
                                <input type="submit" id="star5" name="rating" value="5"><label class="full" for="star5" title="Awesome - 5 stars"></label>
                                <input type="submit" id="star4half" name="rating" value="4.5"><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="submit" id="star4" name="rating" value="4"><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                <input type="submit" id="star3half" name="rating" value="3.5"><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="submit" id="star3" name="rating" value="3"><label class="full" for="star3" title="Meh - 3 stars"></label>
                                <input type="submit" id="star2half" name="rating" value="2.5"><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="submit" id="star2" name="rating" value="2"><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="submit" id="star1half" name="rating" value="1.5"><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="submit" id="star1" name="rating" value="1"><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                                <input type="submit" id="starhalf" name="rating" value="0.5"><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                <input type="hidden" value="{{$schools->id}}" name="school">
                            </fieldset>
                        </form>
                            @endif
                    </span>
                </p>

                <p><i class="fa fa-user colori"></i> {{$schools->student_num}}</p>
                <p><i class="fa fa-location-arrow colori"></i> {{$schools['address_'.App::getLocale()]}}</p>
                <p><i class="fa fa-globe colori"></i> <a href="{{asset($schools->website)}}">{{asset($schools->website)}}</a> </p>
                <p><i class="fa fa-paperclip colori"></i> {{$schools->admission_date or 'unavailable'}}</p>
                <p><i class="fa fa-mail-forward colori"></i> {{$schools->email or 'unavailable'}}</p>
                <p><i class="fa fa-phone colori"></i> {{$schools->phone or 'unavailable'}}</p>
            </div><!-- end first col-6 -->


            <div class="col-md-6 sec-col-h">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        {{--@if($k<=2)
                            <div class="item active div-scho-img-prof">
                                <img style=" height: 100%; margin: 0 auto;" src="" alt="">
                            </div>
                        @endif--}}

                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @foreach($schools->school_gallery_images as $k=>$image)

                                <li data-target="#carousel-example-generic" data-slide-to="{{$k}}" class="{{($k==0)?'active':''}}"></li>
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach($schools->school_gallery_images as $k=>$image)
                                <div style="height: 300px"  class="item {{($k==0)?'active':''}}">
                                    <img src="{{ loadAsset($image->url) }}" style="margin:0 auto;    height: 100%   ;" alt="EasySchool-{{$schools['name_'.app()->getLocale()]}}">
                                    <div class="carousel-caption">
                                        ...
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- Wrapper for slides -->
                {{--<div class="carousel-inner">
                    <div class="item active div-scho-img-prof">
                        <img style=" height: 100%; margin: 0 auto;" src="pic/Artboard%208.png" alt="">
                    </div>

                    <div class="item div-scho-img-prof">
                        <img style=" height: 100%; margin: 0 auto;" src="pic/partners/yKwmVW2VfDB6UAovfwwAABzMipAV9k9L3m0KkCYv.jpeg" alt="">
                    </div>

                    <div class="item div-scho-img-prof">
                        <img style=" height: 100%; margin: 0 auto;" src="pic/Artboard%208.png" alt="">
                    </div>
                </div>--}}

                <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>


                <ul class="un-li-ph">
                    <li class="nam-schol-social ">School Social account</li>
                    <li><a href="{{ $schools->facebook }}" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                    <li><a href="{{ $schools->instagram }}" target="_blank"><i class="fa fa-instagram fa-2x"></i></a></li>
                    <li><a href="{{ $schools['google+'] }}" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
                    <li><a href="https://maps.google.com/?q={{ $schools->latitude }},{{ $schools->longitude  }}" target="_blank"><i class="fa fa-location-arrow fa-2x"></i></a></li>
                    <li><a href="{{ $schools->youtube }}" target="_blank"><i class="fa fa-youtube-play fa-2x"></i></a></li>
                    <li><a href="{{ $schools->linkedin }}" target="_blank"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
                </ul>
            </div>

        </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!-- ============================================ Start Main Section Body ================================================== -->

    <section>
        <div class="container">
            <div class="row">

                <div class="col-xs-12" style="margin:70px 0">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block; text-align:center;"
                         data-ad-layout="in-article"
                         data-ad-format="fluid"
                         data-ad-client="ca-pub-5518639241625534"
                         data-ad-slot="3924495191"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>


                <!-- ==== start section col-8 ===== -->
                <div class="col-md-8 col-sm-12 col-xs-12"><!-- start col 8 -->

                    <div class="col-xs-12" style="margin-top: -40px">
                        <hr class="hr-text" data-content="About School">
                    </div>

                    <div class="col-md-12 text-center">
                        <p class="parag-about-scho">{{ $schools['about_'. app()->getLocale()] }}</p>
                    </div>

                    <div class="col-xs-12">
                        <hr class="hr-text" data-content="Fees">
                        @if($schools->fees->count() > 0)
                    </div>
                    <div class="col-md-12">
                        <table class="table table-hover" style=" height: 300px; overflow-y: scroll;">
                            <thead>
                            <tr>
                                <th>Certificate</th>
                                <th>Fees</th>
                                <th>Currency Unit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schools->fees as $key=>$fee)
                                <tr>
                                    @if($fee->amount!=0)
                                        <td>{{$fee['name_'.app()->getLocale()] }}</td>
                                        <td>{{$fee->amount}}</td>
                                        <td>{{$fee->unit}}</td>
                                    @elseif($key==0)
                                        <td rowspan="3" class="">Don't have fees</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <!-- ===================================== Start CCacilities ============================ -->
                    @if($schools->facilities->count())

                        <div class="col-xs-12">
                            <hr class="hr-text" data-content="Facilities">
                        </div>

                        <div class="col-md-12">
                            <br>
                            <table style="width: 100%" class="table-facilities">
                                @foreach ($facilities as $type=>$values)
                                    <tr>
                                        <td style="color: #00415f; font-weight: bold" width="30%"> {{$type}} </td>
                                        <td width="70%">
                                            @php $i=0 @endphp
                                            @foreach ($values as $value)
                                                @if($i != 0) , @endif
                                                {{$value}}
                                                @php $i++ @endphp
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                            <br>
                        </div>
                    @endif

                    <div class="col-xs-12">
                        <hr class="hr-text" data-content="Comments">
                    </div>
                    @if(!Auth::check())
                        <div class="form-group center" style="margin-top:25px;">
                            <h4 style="padding-left:15px; margin-top:25px; color:#00415f;">Please Login to comment</h4>
                            <a href="{{ url('/en/login') }}" class="btn"><i class="fa fa-globe"></i> Easy Schools</a>
                            <a href="{{ url('/auth/facebook') }}" class="btn"><i class="fa fa-facebook"></i> Facebook</a>
                            <a href="{{ url('/auth/twitter') }}" class="btn"><i class="fa fa-twitter"></i> Twitter</a>
                            <a href="{{ url('/auth/google') }}" class="btn"><i class="fa fa-google"></i> Google</a>
                            <a href="{{ url('/auth/linkedin') }}" class="btn"><i class="fa fa-linkedin"></i> Linkedin</a>
                        </div>
                @endif

                {{--
                                @if($schools->comments->count() > 0)
                --}}
                {{--
                                <div class="col-md-12 main-box-comments"><!-- = box comments = -->
                                  @if(Auth::user())
                                    <div class="col-md-12 "><!--start write comment -->
                                        <div class="col-md-2 imguser-add-comment">
                                            <h2 class="text-info">{{Auth::user()->name}}</h2>

                                        </div>

                                        <form method="post" action="{{ route('comment', ['lang'=>App::getLocale()]) }}" class="col-md-10">
                                             {{ csrf_field() }}
                                            <input type="hidden" name="school_id" value="{{ $schools->id }}">
                                            <textarea class="text-to-write-comment" name="text" placeholder="Write your comment..." required></textarea>
                                            <button class="submit-comment">submit</button>
                                        </form>
                                        <!--<hr style="border: 2px solid green">-->
                                    </div><!--end write comment -->
                                    <hr>
                --}}
                {{--
                                    @endif
                --}}{{--

                                    @foreach($schools->comments as $comment)
                                    <div class="col-md-12 one-added-comment"><!-- added comment -->
                                        <hr style="border: 1px solid #aaaaaa">
                                        <div class="col-md-2 imguser-add-comment">
                                            <img src="{{loadAsset('backend/website/images/Users-User-Male-2-icon.png')}}" alt="EasySchools-userImage">
                                        </div>
                                        <div class="col-md-10 bod-replay">
                                            <h4>{{$comment->user->name}}</h4>
                                            <p>
                                              as
                                                {{$comment->text}}
                                            </p>
                                        </div>
                                        <div class="col-md-12"><!-- start replay -->
                                            <p class="pull-right replay-open" style="cursor: pointer;">
                                                Replies
                                              </p>
                                            <div class="col-md-12 one-added-replay"><!-- added comment -->
                                                <hr style="border: 1px solid #aaaaaa">
                                                @foreach($comment->replays as $reply)
                                                <div class="col-md-2 imguser-add-comment">
                                                    <img src="{{ loadAsset('backend/website/user.png') }}" alt="EasySchools-userImage">
                                                </div>
                                                <div class="col-md-10"><!--end replay -->
                                                    <h5>{{ $reply->user->name }}</h5>
                                                    <p>
                                                        {{ $reply->text }}
                                                    </p>
                                                </div><!--end replay -->
                                                @endforeach
                --}}
                {{--
                                                @if(Auth::user())
                --}}{{--

                                        <form  method="post" class="div-cont-tex-rep" action="{{route('reply') }}"><!-- text area replay -->
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                    <textarea style="display: block !important;" class="one-to-add-replay" name="text" required></textarea>
                                                    <input type="submit" class="submit-comment"></button>
                                                </form>
                --}}
                {{--
                                                @endif
                --}}{{--

                                            </div><!-- added comment -->
                                        </div><!-- end replay -->
                                        <hr>
                                    </div><!-- added comment -->
                                    @endforeach
                                </div><!-- = end box comments = -->
                                @else
                                <div class="panel panel-default">
                                  <div class="panel-body">Be the first to review <b>{{$schools->name_en}}</b></div>
                                </div>
                                @endif
                    @if(!Auth::user())
                            </div>
                     @endif
                            </div><!-- ejnd col -8 -->
                --}}



                <!-- === start col 4 === -->
                    <div class="col-md-4 col-sm-12 col-xs-12 col4rl">
                        <div class="col-xs-12">
                            <hr style="margin-top: -20px" class="hr-text" data-content="Similar Schools">
                        </div>
                        <div class="col-md-12 main-box-allsimilarschool">
                            @foreach($similars as $school)
                                <div class="col-md-6 cor-box-schoo"><!-- school -->
                                    <div class="divinsde-col6 text-center">
                                        <img class="divinsde-img" src="{{ asset($school->logo) }}" alt="EasySchools-logo">
                                        <p><a href=" {{ route('schoolProfile', ['lang'=>App::getLocale(), 'slug'=>$school['slug_'. App::getLocale()]]) }} ">{{ $school['name_'. App::getLocale()] }}</a></p>
                                        <i class="fa fa-star">{{ $school->Rate() }}</i>
                                    </div>
                                </div><!-- school -->
                            @endforeach

                        </div>

                        <div class="col-xs-12" style="margin:20px 0">
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <ins class="adsbygoogle"
                                 style="display:block; text-align:center;"
                                 data-ad-layout="in-article"
                                 data-ad-format="fluid"
                                 data-ad-client="ca-pub-5518639241625534"
                                 data-ad-slot="3924495191"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>


                        <div class="col-xs-12">
                            <hr class="hr-text" data-content="Articles ">
                        </div>
                        <div class="col-md-12 main-box-articles">
                            <div class="col-md-12 "><!-- == start col4 ==-->
                                @if($articles!=null)
                                    @foreach($articles   as $article)
                                        <div class=" box-scol-wraper-arti"><!-- start wraper -->
                                            <h4 class="text-center">{{str_limit($article->title->rendered,35)}}</h4>
                                            <p>
                                                {{ strip_tags(str_limit($article->excerpt->rendered,100)) }}
                                            </p>
                                            <div class="col-md-12">
                                                <p class="pull-right">
                                                    <a href="{{ $article->link }}">
                                                        Read more
                                                    </a>
                                                </p>
                                            </div>
                                        </div><!-- end wraper -->
                                    @endforeach
                                @endif
                            </div>
                        </div>

                    </div>


                    <!-- === end start col 4 === -->

                </div>
            </div>
            <div class="col-xs-12" style="margin:10px 0">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle"
                     style="display:block; text-align:center;"
                     data-ad-layout="in-article"
                     data-ad-format="fluid"
                     data-ad-client="ca-pub-5518639241625534"
                     data-ad-slot="3924495191"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
    </section>


@stop
