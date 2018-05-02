{{--{{dd($errors)}}--}}
<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} User</h3></div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Name</label>
        <div class="col-md-9">
            {{Form::text('name',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Image</label>
        <div class="col-md-9">
            @if(@$user && $user->image != '')
                <div class="col-md-9"  >
                    <img src="{{loadAsset('uploads/'.$user->image)}}" style="height: 100px" alt="{{$user->name}}">
                </div>
            @endif
            {{Form::file('img',['class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('img')}}</small>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Phone</label>
        <div class="col-md-9">
            {{Form::text('phone',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('phone')}}</small>
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
        <label class="control-label col-md-3" for="inputError">School</label>
        <div class="col-md-9">
                {{Form::select('school_id',$school,null,['class'=>'form-control select2'])}}
                <small class="text-danger">{{$errors->first('school_id')}}</small>

            </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">External School</label>
        <div class="col-md-9">
            {{Form::text('ex_school',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('ex_school')}}</small>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Address</label>
        <div class="col-md-9">
            {{Form::text('address',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('address')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Type</label>
        <div class="col-md-9">
            {{Form::select('type',['1'=>'manger','2'=>'teacher','3'=>'parent','4'=>'student'],null,['class'=>'form-control'])}}
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
                <a href="{{url('/lead/users')}}" type="button" class="btn default">Cancel</a>
            </div>
        </div>
    </div>

</div>
