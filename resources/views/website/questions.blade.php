@extends("layouts.app")
@section('css')
    <link rel="stylesheet" href="{{loadAsset('backend/website/css/communityStyle.css')}}">
@endsection
@section('content')
    @if(session('message'))
    <div id="myModal" class="modal fade text-center" role="dialog">
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h2>EasySchools Community</h2>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <h3>{{trans('messages.askQuestion')}}</h3>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <form action="{{route('searchQuestion',['lang'=>app()->getLocale()])}}">
                        <input name="search" type="search" placeholder="Search in a Community">
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
    <span>Most Popular</span>
</div>
<!-- hr -->

<!-- ============ start most popular ============ -->
<section class="popular-questions">
    <div class="container">
        <div class="row">
            <div class="col-xs-12" style="margin:10px">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-5518639241625534" data-ad-slot="8503149470"></ins>
                <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                <div class="add-question">
                    <h5><a href="#ask-question" class="ask-question">ADD QUESTION</a></h5>
                </div><!-- .add-question -->
            </div><!-- .col -->

@foreach($questions as $question)

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="question">
                    <h4><a href="{{route('displayQuestion',['lang'=>app()->getLocale(),'q_id'=>$question->id])}}">{{$question->question}}</a></h4>
                    
                    <p>answers: 15</p>
                    <p>{{date('d-m-Y', strtotime($question->created_at))}}</p>


                </div><!-- .question -->
            </div><!-- .col -->
@endforeach
            <div class="col-xs-12" style="margin:10px">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <ins class="adsbygoogle" style="display:inline-block;width:728px;height:90px" data-ad-client="ca-pub-5518639241625534" data-ad-slot="8503149470"></ins>
                <script> (adsbygoogle = window.adsbygoogle || []).push({}); </script>
            </div>
        </div><!-- .row -->
    </div><!-- .container -->
</section>
<!-- ============ end most popular ============ -->
{{--

<!-- hr -->
<div class="hr">
    <span>Others</span>
</div>
<!-- hr -->

<!-- ============ start others ============ -->
<section class="popular-questions">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                <div class="add-question">
                    <h5><a href="#ask-question" class="ask-question">ADD QUESTION</a></h5>
                </div><!-- .add-question -->
            </div><!-- .col -->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="question">
                    <h4><a href="#">Did you have to wear a uniform in high school? how about elementry school?</a></h4>
                    <p>answers: 15</p>
                    <p>12 days ago</p>
                </div><!-- .question -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</section>
<!-- ============ end others ============ -->
--}}

<!-- hr -->
<div id="ask-question" class="hr text-center">
    <span>Your Question</span>
</div>
<!-- hr -->

<!-- ============ start ask ============ -->
<section class="ask">
    <div class="container">
        <div class="row">
            <form action="{{route('addQuestion',['lang'=>app()->getLocale()])}}" method="post">
                {{csrf_field()}}
                @if(Auth::user())
                    <input type="hidden" name="username" value="{{Auth::user()->name}}" placeholder="Username" />
                    <input type="hidden" name="email" value="{{Auth::user()->email}}" placeholder="Email" />
                @else
                <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-12 col-xs-12 text-left">
                    <label>Name:</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-left">
                    <input type="text" name="username">
                    <small class="text-danger">{{$errors->first('username')}}</small>
                </div>
                <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-12 col-xs-12 text-left">
                    <label>Email:</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-left">
                    <input type="email" name="email">
                    <small class="text-danger">{{$errors->first('email')}}</small>
                </div>
                @endif
                <div class="col-lg-2 col-lg-offset-2 col-md-2 col-md-offset-2 col-sm-12 col-xs-12 text-left">
                    <label>Question:</label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 text-left">
                    <textarea name="question"></textarea>
                    <small class="text-danger">{{$errors->first('question')}}</small>
                </div>
                <div class="col-lg-4 col-lg-offset-8 col-md-4 col-md-offset-8 col-sm-12 col-xs-12 text-center">
                    <input type="submit" value="Submit">
                </div>
            </form>

        </div><!-- .row -->

    </div><!-- .container -->
</section>


<!-- ============ end ask ============ -->
@endsection
@section('script')
    @if (session('message'))
        <script type="text/javascript">
            $(window).on('load',function(){
                $('#myModal').modal('show');
            });

        </script>
    @endif
@stop
