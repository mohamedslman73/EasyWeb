@extends("layouts.app")

@section('css')
    <link href="{{loadAsset('backend/website/css/favourableStyle.css')}}" rel="stylesheet"/>
@endsection
@section('content')
    <section class="all-schools-as">
        <div class="container">
            <div class="row">

                <div class="col-md-12 alert alert-info alert-dismissable"><!-- start msg info -->
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p class="text-center">
                        <strong>{{(count($favorites)!=0)? count($favorites) :"No"}} School</strong>   listed
                    </p>
                </div>

                <div class="all-schools-main-page col-md-12 wrapper" ><!-- all schools -->
                    @foreach($favorites as $favorite)
                    <div class="col-sm-6" id="{{$favorite->id}}"><!-- start school -->
                        <div class="schools-cont-cor col-md-12"><!--start cor -->
                            <div class="col-md-4"><!-- school img -->
                                <img src="{{loadAsset($favorite->logo)}}" class="img-responsive center-block im-box-a-sch" alt="EasySchools-{{$favorite['name_'.app()->getLocale()]}}-logo">
                            </div><!--end school img -->
                            <div class="col-md-8"><!--start school info -->
                                <p class="school-name"><a href="{{loadAsset('/schoolProfile/'.$favorite->slug_en)}}">{{$favorite['name_'.app()->getLocale()]}}</a></p>
                                <p class="clas-dif comment">{{$favorite['about_'.app()->getLocale()]}}</p>
                                <div class="col-md-12">
                                    <div class="col-md-6 appr-r-e"> <i class="fa  fa-heart close-faver" school="{{$favorite->id}}" aria-hidden="true"></i></div>
                                    <div class="col-md-6 ede-at"><small>Listed: {{$favorite->created_at}}</small></div>
                                </div>
                            </div><!--end school info -->
                        </div><!-- end cor -->
                    </div><!-- end school -->
                    @endforeach

                </div><!-- start all schools -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <script>
        $(document).on('click','.close-faver',function () {
            var school= $(this).attr('school');
            var school_id='#'+school;
            var _token = '{{ csrf_token() }}';
            $.ajax({
                url:'{{ route('user.deleteFavorite',['lang'=>app()->getLocale()]) }}',
                type: "get",
                dataType: "json",
                data: {school:school,_token:_token},

                success:function (data) {
                    return'success';
                }

            });
                    $(school_id).remove();
        })
    </script>

@endsection
