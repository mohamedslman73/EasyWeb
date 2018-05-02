@extends("admin.layout")
@section('title',"Questions")
@section("content")
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">@yield('title')</span>
            </div>
        </div>

        <div class="portlet-body">

                <div class="form-group">
                    <label class="control-label col-md-3" for="inputWarning">Question</label>
                    <div class="col-md-9">
                        <p>{{$question->question}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="inputWarning">Username</label>
                    <div class="col-md-9">
                        <p>{{$question->username}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3" for="inputWarning">Email</label>
                    <div class="col-md-9">
                        <p>{{$question->email}}</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 text-success" for="inputWarning">Answers</label>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Answer</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($question->answers()->get() as $answer)
                            <tr>
                                <td>{{$answer->answer}}</td>
                                <td>{{$answer->username}}</td>
                                <td>{{$answer->email}}</td>
                                <td><a href="/lead/questions/deleteAnswer/{{$answer->id}}" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                    @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="form-actions">
                    <div class="row"><br><br><br>
                        <div class="col-md-offset-3 col-md-9"><br>
                            <a href="{{url('/lead/questions')}}" type="button" class="btn default">Back</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
@stop