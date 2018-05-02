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
        <link href="{{loadAsset('/backend/website/css/articlesStyle.css')}}" rel="stylesheet"/>
@endsection
<!-- ============ start slider ============ -->
<section id="header" style="margin-top: 5%" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2>{{trans('messages.welcome')}}</h2>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h3>{{trans('messages.articles')}}</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 search text-center">
                        <form>
                            <input type="search" placeholder="{{trans('messages.searchArticles')}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============ end slider ============ -->

<!-- hr -->
<div class="hr text-center">
    <span>{{trans('messages.most_popular')}}</span>
</div>
<!-- hr -->

<!-- ========== start articles ========== -->
<section class="articles" style="margin-bottom:5%; ">
    <div class="container">
        <div class="row">
            @foreach($articles as $article)
            <div class="col-md-4 col-xs-6">
                <div class="article">
                    <img src="{{loadAsset('uploads/'.$article->logo)}}" class="img-responsive cover">
                    <div class="col-md-12 text-center">
                        <h4>{{$article['title_'.app()->getLocale()]}}</h4>
                        <h5>{{trans('messages.added_in')}} {{date('d-m-Y', strtotime($article->created_at))}}</h5>
                        <p class="text-left">{{strip_tags($article['text_'.app()->getLocale()])}}</p>
                        <p class="text-right"><a href="{{route('showArticle',['lang'=>app()->getLocale(),'article'=>$article->id])}}">See more > ></a></p>
                    </div><!-- div.col-md-8 -->
                </div><!-- div.col-md-12.article -->
            </div><!-- div.col-md-4 -->
            @endforeach
        </div><!-- div.row -->
    </div><!-- div.container -->
</section><!-- section.articles -->
<!-- ========== end articles ========== -->
