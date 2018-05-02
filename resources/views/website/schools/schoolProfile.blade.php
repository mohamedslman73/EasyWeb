@extends('layouts.app')
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
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/website/css/newSchoolProfileStyle.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('script')
    <script src="{{ loadAsset('backend/website/js/schoolProfileScript.js') }}"></script>
<script>
    $('.click-star').click(function () {
        $('.star-rating').toggle();
    });
</script>
    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Product",
  "name": "School name",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue" : "{{$schools->Rate()}}",
    "ratingCount": "{{ App\SchoolRate::orderBy('school_id')->count()}}",
    "reviewCount": "1000"
  }
}
</script>

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "School",
  "name": "{{$schools->name_en}}",
  "url": "{{$schools->website}}",
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

    <!-- ============ start header ============ -->
    <section id="header" style="margin-top: 100px;">
        <div class="container">
            <div class="row">

                <div class="col-md-7 sch-info">
                    <div class="logo">
                        <img src="{{asset($schools->logo)}}" alt="EasySchools-{{$schools['name_'.App::getLocale()]}}-logo">
                    </div>
                    <div><!-- de el bdaya -->

                        <h2>
                            <span class="paransch"> {{$schools['name_'.App::getLocale()]}} </span>

                                <i class="fa fa-star colors click-star"></i>
                                {{ $schools->Rate() }}
                                <div class="star-rating text-left" style="display: none;">
                                    <div class="star-rating__wrap">
                                        <form  action="{{route('rate',['lang'=>app()->getLocale()])}}" method="post">
                                            <input name="rating" class="star-rating__input" id="star-rating-5" type="submit" name="rating" value="5">
                                            <label class="star-rating__ico fa fa-star-o fa-3x" for="star-rating-5" title="5 out of 5 stars"></label>
                                            <input name="rating" class="star-rating__input" id="star-rating-4" type="submit" name="rating" value="4">
                                            <label class="star-rating__ico fa fa-star-o fa-3x" for="star-rating-4" title="4 out of 5 stars"></label>
                                            <input name="rating" class="star-rating__input" id="star-rating-3" type="submit" name="rating" value="3">
                                            <label class="star-rating__ico fa fa-star-o fa-3x" for="star-rating-3" title="3 out of 5 stars"></label>
                                            <input name="rating" class="star-rating__input" id="star-rating-2" type="submit" name="rating" value="2">
                                            <label class="star-rating__ico fa fa-star-o fa-3x" for="star-rating-2" title="2 out of 5 stars"></label>
                                            <input name="rating" class="star-rating__input" id="star-rating-1" type="submit" name="rating" value="1">
                                            <label class="star-rating__ico fa fa-star-o fa-3x" for="star-rating-1" title="1 out of 5 stars"></label>
                                            <input type="hidden" value="{{$schools->id}}" name="school">
                                        </form>
                                    </div>
                                </div>

                        </h2>



                    </div><!-- de el nhaya -->


                    <div class="sch-item">
                        <i class="fa fa-child"></i>
                        @if($schools->student_num=='-')
                            <p>{{trans('messages.not_available')}} {{trans('messages.student_num')}}</p>
                            <img src="{{asset('backend/website/pic/icon/exclamation.png')}}" alt="EasySchools-error" class="not-found">
                        @else
                            <p>{{trans('messages.student_num')}} {{$schools->student_num}}</p>
                        @endif
                    </div>
                    <div class="sch-item">
                        <i class="fa fa-map-marker"></i>
                        @if($schools['address_'.app()->getLocale()])
                            <p>{{$schools['address_'.app()->getLocale()]}}</p>
                        @else
                            <p>{{trans('messages.not_available')}} {{trans('messages.address')}}</p>
                            <img src="{{asset('backend/website/pic/icon/exclamation.png')}}" alt="EasySchools-error" class="not-found">
                        @endif
                    </div>
                    <div class="sch-item">
                        <i class="fa fa-globe"></i>
                        @if($schools->website)
                            <p>
                                <a href="{{$schools->website}}">{{$schools['name_'.app()->getLocale()]}} {{trans('messages.website')}}</a>
                            </p>
                        @else
                            <p>{{trans('messages.not_available')}} {{trans('messages.website')}}</p>
                            <img src="{{asset('backend/website/pic/icon/exclamation.png')}}" alt="EasySchools-error" class="not-found">
                        @endif
                    </div>
                    <div class="sch-item">
                        <i class="fa fa-newspaper-o"></i>
                        @if($schools->admission_url)
                            <p>{{trans('messages.admission_url')}}: {{$schools->admission_url}}</p>
                        @else
                            <p>{{trans('messages.not_available')}} {{trans('messages.admission_url')}}</p>
                            <img src="{{asset('backend/website/pic/icon/exclamation.png')}}" alt="EasySchools-error" class="not-found">
                        @endif
                    </div>
                    <div class="sch-item">
                        <i class="fa fa-envelope-square"></i>
                        @if($schools->email)
                            <p>{{$schools->email}}</p>
                        @else
                            <p>{{trans('messages.not_available')}} {{trans('messages.email')}}</p>
                            <img src="{{asset('backend/website/pic/icon/exclamation.png')}}" alt="EasySchools-error" class="not-found">
                        @endif
                    </div>
                    <div class="sch-item">
                        <i class="fa fa-phone"></i>
                        @if($schools->phone)
                            <p>{{$schools->phone}}</p>
                        @else
                            <p>{{trans('messages.not_available')}} {{trans('messages.phone')}}</p>
                            <img src="{{asset('backend/website/pic/icon/exclamation.png')}}" alt="EasySchools-error" class="not-found">
                        @endif
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="col-md-10 text-center adv">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- responsive ad display only -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-5518639241625534"
                             data-ad-slot="7354272616"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <div class="col-md-10 text-center ad no-padding">
                        <!-- carousel -->
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
                                    <div class="item {{($k==0)?'active':''}}">
                                        <img src="{{ loadAsset($image->url) }}" alt="EasySchool-{{$schools['name_'.app()->getLocale()]}}">
                                        <div class="carousel-caption">
                                            {{$schools['name_'.app()->getLocale()]}}
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

                        <!-- carousel -->
                    </div>
                    <div class="col-md-10 text-center social-media">
                        <p>{{trans('messages.social')}}</p>
                        <a href="https://maps.google.com/?q={{ $schools->latitude }},{{ $schools->longitude  }}"><i style="font-size: 20px; color: #00A388" class="fa fa-map-marker fa-2x social-icons"></i></a>&nbsp;
                        <a href="{{ $schools->facebook }}"><i style="font-size: 20px; color: blue;" class="fa fa-facebook-square fa-2x social-icons"></i></a>&nbsp;&nbsp;
                        <a href="{{ $schools->instagram }}" ><i style="font-size: 20px; color: #c4257b" class="fa fa-instagram fa-2x social-icons"></i></a>&nbsp;
                        <a href="{{ $schools->youtube }}"><i style="font-size: 20px; color: red;" class="fa fa-youtube fa-2x social-icons"></i></a>&nbsp;
                        <a href="{{ $schools->linkedin }}"><i class="fa fa-linkedin fa-2x social-icons"></i></a>&nbsp;&nbsp;&nbsp;
                        <a href="{{ $schools->googleplus }}"><i style="font-size: 20px; color: darkred;" class="fa fa-google-plus  fa-2x social-icons"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============ end header ============ -->

    <!-- ============ start about-school ============ -->
    <section class="about-school">
        <div class="container">
            <div class="row">

                <div class="col-md-8 side-border">

                    <!-- about -->
                    <div class="col-md-12 text-center about">
                        <!-- hr -->
                        <div class="hr text-center">
                            <span>{{trans('messages.about_school')}}</span>
                        </div>
                    @if($schools['about_'.app()->getLocale()])
                        <!-- hr -->
                            <h4>{{$schools['about_'.app()->getLocale()]}}</h4>
                        @else
                            <img src="{{asset('backend/website/pic/icon/fileError.png')}}" class="no-data">
                            <h4>School Information not Available</h4>
                    @endif
                    <!-- hr -->
                        <hr>
                        <div class="col-md-12 text-center ad">
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

                    <!-- start fees -->
                    <div class="col-md-12 text-center fees">
                        <!-- hr -->
                        <div class="hr text-center">
                            <span>{{trans('messages.fees')}}</span>
                        </div>
                        <!-- hr -->
                        @if(count($schools->fees)==0)
                            <img src="{{asset('backend/website/pic/icon/fileError.png')}}" class="no-data">
                            <h4>{{trans('messages.not_available_inf')}}</h4>
                        @else
                            <table class="table table-striped">

                                <thead>
                                <tr>
                                    <th scope="col">Certificate</th>
                                    <th scope="col" class="text-center">Fees</th>
                                    <th scope="col" class="text-center">Currency Unit</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($schools->fees as $key=>$fee)
                                    <tr >
                                        <th scope="row">{{$fee['name_'.app()->getLocale()] }}</th>
                                        @if($fee->amount!=0)
                                            <td>{{$fee->amount}}</td>
                                        @else
                                            <th scope="row">{{trans('messages.not_available')}}</th>
                                        @endif
                                        <td>{{$fee->unit}}</td>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- end fees -->

                    <!-- start facilities -->
                    <div class="col-md-12 text-center facilities">
                        <!-- hr -->
                        <div class="hr text-center">
                            <span>{{trans('messages.facilities')}}</span>
                        </div>
                        <!-- hr -->
                        @if(!$facilities)
                            <img src="{{asset('backend/website/pic/icon/fileError.png')}}" class="no-data">
                            <h4>{{trans('messages.not_available_inf')}}</h4>
                        @else
                            <table class="table table-striped table-bordered">
                                @foreach ($facilities as $type=>$values)
                                    <tr class="text-left">
                                        <th scope="row">{{$type}}</th>
                                        <td>
                                            @foreach ($values as $k=>$value)
                                                {{($k!=0)?',':''}}
                                                {{--{{route('facilitySearCh',['lang'=>app()->getLocale(),'slug'=>make_slug($value)])}}--}}
                                                <a href="/{{app()->getLocale()}}/schools/classification/{{make_slug($value)}}">{{$value}}</a>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                        <hr>
                        <div class="col-md-12 text-center ad">
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
                    <!-- end facilities -->


                </div><!-- div.col-md-8 , side-border -->

                <div class="col-md-4">


                    <!-- start similar schools -->
                    <div class="col-md-12 text-center">
                        <!-- hr -->
                        <div class="hr text-center">
                            <span>{{trans('messages.similar_schools')}}</span>
                        </div>
                        <!-- hr -->
                        @foreach($similars as $school)
                            <div class="col-xs-6">
                                <div class="similar-schools">
                                    <img src="{{ asset($school->logo) }}">
                                    <div class="sim-sch-name">
                                        <p><a href="{{ route('schoolProfile', ['lang'=>App::getLocale(), 'slug'=>$school['slug_'. App::getLocale()]]) }}">{{ $school['name_'. App::getLocale()] }}</a></p>
                                    </div>
                                    <i class="fa fa-star"></i>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- div.similar schools -->
                    <!-- end similar schools -->
                    <div class="col-md-12 text-center ad" style="display: none;">
                        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                        <!-- responsive ad display only -->
                        <ins class="adsbygoogle"
                             style="display:block"
                             data-ad-client="ca-pub-5518639241625534"
                             data-ad-slot="7354272616"
                             data-ad-format="auto"></ins>
                        <script>
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        </script>
                    </div>
                    <!-- start Articles -->
                    <div class="col-xs-12 text-center articles">
                        <!-- hr -->
                        <div class="hr text-center">
                            <span>{{trans('messages.articles')}}</span>
                        </div>
                        <!-- hr -->
                        {{--@foreach($articles as $article)
                            <div class="col-xs-12">
                                <div class="article">
                                    <div class="col-xs-5 article-pic">
                                        <img src="{{loadAsset('uploads/'.$article->logo)}}">
                                    </div>
                                    <div class="col-xs-7 text-right article-text">
                                        <h5 class="text-center">{{$article['title_'.app()->getLocale()]}}</h5>
                                        <p class="text-left">{{$article['text_'.app()->getLocale()]}}</p>
                                        <p><a href="{{route('showArticle',['lang'=>app()->getLocale(),'article'=>$article->id])}}">Read more > ></a></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach--}}
                        @foreach($articles as $article)
                        <div class="col-xs-12">
                            <div class="article">
                                <a href="#">
                                    <div class="col-xs-5 article-pic">
                                        <img src="{{loadAsset('uploads/'.$article->logo)}}">
                                    </div>
                                    <div class="col-xs-7 text-right article-text">
                                        <h5 class="text-left">{{$article['title_'.app()->getLocale()]}}</h5>
                                        <p><a href="{{route('showArticle',['lang'=>app()->getLocale(),'article'=>$article->id])}}">Read more > ></a></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-xs-12 text-center ad">
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
                    <!-- end Articles -->

                </div><!-- div.col-md-4 -->



                <div class="col-md-12">
                    <hr>
                </div>
            </div><!-- div.row -->
        </div><!-- div.container -->
    </section><!-- section.about-school -->
    <!-- ============ end about-school ============ -->
@endsection
