@extends("layouts.app")
@if($seo!=null)
@section('title') EasySchools | {{$seo->title}} @endsection
@section('description'){{$seo['meta_description_'.app()->getLocale()]}} @endsection
@if(@$cityName)
    @if(app()->getLocale()=='en')
        @section('description'){{str_replace('cairo', $cityName , $seo['meta_description_'.app()->getLocale()])}} @endsection
        @section('keywords'){{$cityName ."،". str_replace(', ',', '.$cityName.' ' , $seo['meta_keywords_'.app()->getLocale()])}} @endsection
    @else
        @section('description'){{str_replace('القاهرة',$cityName, $seo['meta_description_'.app()->getLocale()])}} @endsection
        @section('keywords'){{$cityName ."،". str_replace('، ',' '.$cityName.'، ' , $seo['meta_keywords_'.app()->getLocale()])}} @endsection
    @endif
@else
@section('description'){{$seo['meta_description_'.app()->getLocale()]}} @endsection
@section('keywords'){{$seo['meta_keywords_'.app()->getLocale()]}} @endsection
@endif
@section('social.title') EasySchools | {{$seo->title}} @endsection
@section('social.description'){{$seo['social_description']}} @endsection
@section('social.image') {{loadAsset('/backend/website/social.png')}} @endsection
@endif
@section('css')
    <link href="{{loadAsset('/backend/website/css/schoolsStyle.css')}}" rel="stylesheet"/>
@endsection

@section('content')

    <!-- =========================== start section search for schools=========================== -->
    <section class="all-schools-as">
        <div class="container">
            <div class="row" style="margin-top: 5%">
                <div class="col-xs-12" style="margin:20px 20px 5px 20px">
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
                <div class="all-schools-main-page col-md-12 wrapper">
                    @if(@$message)
                        <div class="alert">
                            <h3 class="text-success">{{$message}}</h3>
                        </div>
                    @endif
                        <!-- all schools -->
                    @if (session()->has('massage') and count($schools)==0)
                        <div class="alert alert-danger">
                            <h3>{!! session()->get('massage') !!}</h3>
                        </div>
                    @endif
                    @foreach($schools as $school)
                        <div class="col-sm-4">
                            <div class="schools-cont-cor" style="overflow: hidden" data-item-id="1">
                                <div class="color-1">
                                    <img src="{{$school->logo}}" id="schoolImageSize" alt="EasySchools-{{$school['name_'.app()->getLocale()]}}-logo" class="img-responsive center-block im-box-a-sch">
                                </div>
                                @if(Auth::user())
                                    <div class="">
                                        <button type="button" id="1" class="btn  btn-labny btn-lg popup-web" data-toggle="tooltip" title="Compare"> <i class="fa fa-exchange "></i> </button>
                                    </div>
                                    <?php echo renderFavorite($school->id); ?>
                                @endif
                                <p class="school-name"><a href="{{route('schoolProfile',['slug'=>$school['slug_'.app()->getLocale()],'lang'=>app()->getLocale()])}}">{{$school['name_'.app()->getLocale()]}}</a></p>
                                <p class="clas-dif comment" >{{$school['about_'.app()->getLocale()]}}</p>
                            </div>
                        </div>
                    @endforeach

                </div><!-- start all schools -->

            @if($schools)
                <div class="col-md-12 text-center">
                    {{ $schools->links()}}
                </div>
            @endif
                <div class="col-xs-12" style="margin:10px 20px">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-5518639241625534" data-ad-slot="8503149470"></ins>
                    <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
                </div>
        </div><!-- row -->
        </div><!-- container -->

    </section>






@endsection
