@extends('layouts.app')
@section('title')
    {{trans('messages.articles')}}
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
    <link href="{{loadAsset('/backend/website/css/slick-theme.css')}}" rel="stylesheet"/>
    <link href="{{loadAsset('/backend/website/css/slick.css')}}" rel="stylesheet"/>
    <link href="{{loadAsset('/backend/website/css/displayArticleStyle.css')}}" rel="stylesheet"/>
@endsection
@section('content')

    <!-- Floating Button -->

    <!-- ============ start header ============ -->
    <section class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12 text-center" style="margin-top: 80px;">
                    <div style="height: 300px; text-align: center">
                    <img src="{{loadAsset('/uploads/'.$article->logo)}}" alt="">
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 text-center" style="margin-top: 80px;">
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
            </div>
        </div>
    </section>
    <!-- ============ end header ============ -->

    <!-- ============ start content ============ -->
    <section class="content">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-xs-12 text-center date">
                    <h1>{{$article['title_'.app()->getLocale()]}}</h1>
                    <span>{{trans('messages.added_in')}} {{date('d-m-Y', strtotime($article->created_at))}}</span>
                </div>

                <div class="col-md-8 col-xs-12 side-border">
                    <div class="col-xs-12" style='text-align: {{(app()->getLocale()=='ar')?'right;':''}}'>
                        <p class="first">
                            {!! $article['text_'.app()->getLocale()] !!}
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
                        </p>

                        <div class="slider-nav">
                            @foreach($article->article_files as $file)
                            <div class="item"><img src="{{loadAsset('/uploads/'.$file->image)}}"></div>
                            @endforeach
                        </div>

                        <div class="slider-for">
                            @foreach($article->article_files as $file)
                            <div>
                                <p>
                                    {!! $file['img_text_'.app()->getLocale()] !!}
                                </p>
                            </div>
                            @endforeach
                        </div>

                        <div class="col-xs-12 author text-right">
                            <h3>By: EasySchools</h3>
                        </div>
                    </div>
                </div><!-- div.col-md-8 -->

                <div class="col-md-4 col-xs-12">

                    <!-- start Articles -->
                    <div class="col-xs-12 text-center articles">
                        <!-- hr -->
                        <div class="hr col-xs-12 text-center">
                            <span>{{trans('messages.articles')}}</span>
                        </div>
                        <!-- hr -->

                        <div class="col-xs-12">
                                @foreach($otherArticles as $value)
                                    <div class="article">
                                        <div class="col-xs-5 article-pic">
                                            <img src="{{loadAsset('/uploads/'.$value->logo)}}">
                                        </div>
                                        <div class="col-xs-7 text-right article-text">
                                            <h5 class="text-left">{{$value['title_'.app()->getLocale()]}}</h5>
                                            <p><a href="{{route('showArticle',['lang'=>app()->getLocale(),'article'=>$article->id])}}">Read more > ></a></p>
                                        </div>
                                    </div>
                                @endforeach
                        </div>

                        <div class="col-xs-12 text-center ad">
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

                    </div>
                    <!-- end Articles -->

                    <!-- start similar schools -->
                    <div class="col-xs-12 text-center">
                        <!-- hr -->
                        <div class="hr col-xs-12 text-center">
                            <span>{{trans('messages.some_schools')}}</span>
                        </div>
                        <!-- hr -->
                    @foreach($schools as $school)
                        <div class="col-xs-6">
                            <div class="similar-schools">
                                <img src="{{$school->logo}}">
                                <div class="sim-sch-name">
                                    <p>
                                        <a href="{{route('schoolProfile',['slug'=>$school['slug_'.app()->getLocale()],'lang'=>app()->getLocale()])}}">
                                            {{$school['name_'.app()->getLocale()]}}
                                        </a>
                                    </p>
                                </div>
                                <i class="fa fa-star"></i>
                                <p class="rate">{{$school->Rate()}}</p>
                            </div>
                        </div>
                    @endforeach

                        <div class="col-xs-12 text-center ad">
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
                    </div><!-- div.similar schools -->
                    <!-- end similar schools -->

                </div><!-- div.col-md-4 -->



                <div class="col-xs-12">
                    <hr>
                </div>

            </div><!-- div.row -->
        </div><!-- div.container -->
    </section><!-- section.content -->







    <!-- ============ end content ============ -->

@endsection
@section('script')
    <script src="{{ loadAsset('backend/website/js/slick.js') }}"></script>
    <script src="{{ loadAsset('backend/website/js/displayArticleScript.js') }}"></script>
@stop
<!-- ============ end content ============ -->


