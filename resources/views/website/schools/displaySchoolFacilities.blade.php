@extends("layouts.app")
@section('upperSlogan')
{{$facility_name}}
@endsection
@section('css')
    <link href="{{loadAsset('schoolsStyle.css')}}" rel="stylesheet"/>
@endsection
@section('content')

    <!-- =========================== start section search for schools=========================== -->

    <!-- end filter -->



    <section class="all-schools-as">
        <div class="container">
            <div class="row">
                 <div class="all-schools-main-page col-md-12 wrapper"><!-- all schools -->
                    @if (session()->has('massage'))
                        <div class="alert alert-danger">
                            <h3>{!! session()->get('massage') !!}</h3>
                        </div>
                    @endif
                    @foreach($schools as $school)
                        <div class="col-sm-4">
                            <div class="schools-cont-cor" style="overflow: hidden" data-item-id="1">
                                <div class="color-1">
                                    <img src="{{loadAsset($school->logo)}}" id="schoolImageSize" alt="EasySchools-{{$school['name_'.app()->getLocale()]}}-logo" class="img-responsive center-block im-box-a-sch">
                                </div>
                                @if(Auth::user())
                                    <div class="">
                                        <button type="button" id="1" class="btn  btn-labny btn-lg popup-web" data-toggle="tooltip" title="Compare"> <i class="fa fa-exchange "></i> </button>

                                    </div>
                                    <?php echo renderFavorite($school->id); ?>
                                @endif
                                <p class="school-name"><a href="{{url('schoolProfile/'.$school->slug_en)}}">{{$school['name_'.app()->getLocale()]}}</a></p>
                                <p class="clas-dif comment" >{{$school['about_'.app()->getLocale()]}}</p>
                            </div>
                        </div>
                    @endforeach

                </div><!-- start all schools -->







                <div class="col-md-12 text-center">
                    {{ $schools->links()}}
                </div>

            </div><!-- row -->
        </div><!-- container -->
    </section>


@stop
