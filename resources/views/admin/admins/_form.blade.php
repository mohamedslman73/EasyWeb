<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} Admin</h3></div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Name</label>
        <div class="col-md-9">
            {{Form::text('name',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Email</label>
        <div class="col-md-9">
            {{Form::text('email',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('email')}}</small>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Password</label>
        <div class="col-md-9">
            {{Form::password('password',['autocompelete'=>'off','class'=>'form-control',($text!='Update')?'required':''])}}
            <small class="text-danger">{{$errors->first('password')}}</small>
        </div>
    </div>

    <div class="form-actions">
        <div class="row"><br><br><br>
            <div class="col-md-offset-3 col-md-9"><br>
                {{Form::submit($text,['class'=>'btn green'])}}
                <a href="{{url('/lead/districts')}}" type="button" class="btn default">Cancel</a>
            </div>
        </div>
    </div>

</div>