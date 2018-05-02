<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} Main Page Images</h3></div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">name</label>
        <div class="col-md-9">
            {{Form::text('name',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Image</label>
        <div class="col-md-9">
            {{Form::file('img',['class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('img')}}</small>
            @if(@$image && $image->image != '')
                <div class="col-md-9"  >
                    <img src="{{loadAsset('uploads/'.$image->image)}}" style="height: 100px" alt="{{$image->name}}">
                </div>
            @endif
        </div>
    </div>

    <div class="form-actions">
        <div class="row"><br><br><br>
            <div class="col-md-offset-3 col-md-9"><br>
                {{Form::submit($text,['class'=>'btn green'])}}
            </div>
            <a href="{{url('/lead/images')}}" type="button" class="btn default">Cancel</a>
        </div>
    </div>

</div>