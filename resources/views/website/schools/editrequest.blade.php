@extends("layouts.app")
@section('upperSlogan')
   Request Edit
@endsection

@section('css')
    <link rel="stylesheet" href="{{loadAsset('/backend/website/css/requestEditStyle.css')}}">
@endsection
@section('script')
    @endsection

@section('content')
    <section class="all-schools-as">
        <div class="container">
            <div class="row">

                <div class="col-md-12 alert alert-info alert-dismissable"><!-- start msg info -->
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p class="text-center">
                        <strong>{{$edits->count()}} School</strong>   edit requested
                    </p>
                </div>

                <div class="all-schools-main-page col-md-12 wrapper"><!-- all schools -->


                    @foreach($edits as $edit)
                    <div class="col-sm-6"><!-- start school -->
                        <div class="schools-cont-cor col-md-12"><!--start cor -->
                            <div class="col-md-4"><!-- school img -->
                                <img src="{{$edit->school->logo}}" class="img-responsive center-block im-box-a-sch" alt="EasySchools-partnerLogo">
                            </div><!--end school img -->
                            <div class="col-md-8"><!--start school info -->
                                <p class="school-name"><a href="/schoolProfile/{{$edit->school->id}}">{{$edit->school->name_en}}</a></p>
                                <p class="clas-dif comment">

                                   {{$edit->editrequest->value}}
                                </p>
                                @if($edit->editrequest->status ==1)
                                <div class="col-md-12">
                                    <div class="col-md-6 appr-r-e"> <i class="fa fa-check-circle" aria-hidden="true">

                                            Approved
                                        </i></div>
                                    <div class="col-md-6 ede-at"><small>Edited: {{$edit->created_at}}</small></div>
                                </div>
                                    @elseif($edit->editrequest->status ==0)
                                    <div class="col-md-12">
                                        <div class="col-md-6 den-r-e"> <i class="fa fa-times-circle" aria-hidden="true">

                                                Denied
                                            </i></div>
                                        <div class="col-md-6 ede-at"><small>Edited: {{$edit->created_at}}</small></div>
                                    </div>
                                    @else
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="color: #1c2637"> <i  class="fa fa-pencil-square-o" aria-hidden="true">

                                                wait for Edit
                                            </i></div>
                                        <div class="col-md-6 ede-at"><small>Edited: {{$edit->created_at}}</small></div>
                                    </div>
                                    @endif
                            </div><!--end school info -->
                        </div><!-- end cor -->
                    </div><!-- end school -->
                        @endforeach


















                </div><!-- start all schools -->
            </div><!-- row -->
        </div><!-- container -->



    </section>

    @endsection
