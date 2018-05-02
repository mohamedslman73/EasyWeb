@extends("layouts.app")
@section('css')
    <link rel="stylesheet" href="{{loadAsset('/')}}/backend/website/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{loadAsset('/')}}/backend/website/css/partnerStyle.css">
@endsection
@section('content')
<div id="hr" class="text-center">
<span>PARTNERS</span>
</div>
<!-- ============= start partners ========== -->
@foreach($partners as $partner)
<!-- start partner 1 -->
<section class="partners">
    <div class="container">
        <div class="row">

            <!-- partner 1 -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <img src="{{loadAsset('/uploads/'.$partner->logo)}}" alt="EasySchool-{{$partner['name_'.app()->getLocale()]}}-logo" class="img-responsive">
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <h4>{{$partner['name_'.app()->getLocale()]}}</h4>
                <p>{{$partner['about_'.app()->getLocale()]}}</p>
                <div class="text-right"><a href="{{route('info',['lang'=>app()->getLocale()])}}">read more</a></div>
            </div>
            <!-- partner 1 -->


        </div><!-- .row -->
    </div><!-- .container -->
</section><!-- .first-div -->
<!-- end partner 1 -->
@endforeach
<!-- ============= end partners ========== -->
@stop