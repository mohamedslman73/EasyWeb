@extends("layouts.app")
@section('css')
    <link rel="stylesheet" href="{{loadAsset('/backend/website/css/displayQuestionStyle.css')}}">
@endsection
@section('content')
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
                                <h3>Ask about any school and we will answer</h3>
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
        <!-- ============ start quest ============ -->
        <section class="quest">
            <div class="container">
                <div class="row">
                    <div class="col-md-1 hidden-sm hidden-xs">

                    </div>
                    <div class="col-md-11 col-xs-12 text-left">
                        <h4 class="user">{{$question->username}}</h4>
                    </div><!-- .col -->
                    <div class="col-md-1 hidden-sm hidden-xs">

                    </div>
                    <div class="col-md-9 text-left">
                        <h4>{{$question->question}}</h4>
                    </div><!-- .col -->
                    <div class="col-md-2 text-right">
                        <h5>{{$question->created_at}}</h5>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </section><!-- .quest -->
        <!-- ============ end quest ============ -->

        <!-- ============ start answers ============ -->
        <section class="answers">
        <div class="container">
            <div class="row">

                @foreach($question->answers()->get() as $answer)
                <div class="col-md-12 col-xs-12">
                    <div class="col-md-11 col-md-offset-1 col-xs-12">
                        <h4 class="user pull-left">{{$answer->username}}</h4>
                        <h5 class="pull-right">{{$answer->created_at}}</h5>
                    </div>
                    <div class="col-md-1 col-xs-1 pic">
                        <img src="{{loadAsset('/backend/website/pic/thumb.png')}}" alt="EasySchools-answer" />
                    </div>
                    <div class="col-md-7 text-left padding-fix">
                        <h4>{{$answer->answer}}</h4>
                    </div>
                    <div class="col-md-4 text-right">
{{--
                        <button>Reply</button>
--}}
                    </div>
                </div>

                <div class="col-md-12 col-xs-12">
                    <hr />
                </div>
                @endforeach







                <!-- your reply -->
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1 text-center your-reply">
                    <form action="{{route('answer',['lang'=>app()->getLocale()])}}" method="post">
                        {{csrf_field()}}
                    @if(Auth::user())
                            <input type="hidden" name="username" value="{{Auth::user()->name}}" placeholder="Username" />
                            <input type="hidden" name="email" value="{{Auth::user()->email}}" placeholder="Email" />
                        @else
                        <div class="col-md-12 col-xs-12 text-left">
                            <input type="text" name="username" placeholder="Username" />
                            <small class="text-danger">{{$errors->first('username')}}</small>
                        </div>
                        <div class="col-md-12 col-xs-12 text-left">
                            <input type="email" name="email" placeholder="Email" />
                            <small class="text-danger">{{$errors->first('email')}}</small>
                        </div>
                        @endif
                        <div class="col-md-10 col-xs-12 text-left">
                            <input type="hidden" name="question" value="{{$question->id}}">
                            <textarea name='answer' placeholder="Your Reply ......"></textarea>
                            <small class="text-danger">{{$errors->first('answer')}}</small>
                        </div>
                        <div class="col-md-2 col-xs-12 text-center">
                            <input type="submit" value="Submit" />
                        </div>
                    </form>
                </div>
                <!-- your reply -->



            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .answers- -->
        <!-- ============ end answers ============ -->
@endsection
