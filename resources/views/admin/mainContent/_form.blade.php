{{--
{{dd($text)}}
--}}
<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} Content Text</h3></div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">name</label>
        <div class="col-md-9">
    @if($text!="Update")
            {{Form::text('name',null,['class'=>'form-control','required'])}}
    @else
            <p class="form-control">{{$content->name}}</p>
    @endif
            <small class="text-danger">{{$errors->first('name')}}</small>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Arabic Text</label>
        <div class="col-md-9">
            {{Form::textarea('text_ar',null,['rows'=>'4','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('text_ar')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">English Text</label>
        <div class="col-md-9">
            {{Form::textarea('text_en',null,['rows'=>'4','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('text_en')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Page Name</label>
        <div class="col-md-9">
    @if($text!="Update")
        <select class="form-control" name="page_name">
            <option selected disabled>select</option>
            <option value="main">main</option>
            <option value="info">info</option>
            <option value="solution">solution</option>
        </select>
    @else
            <p class="form-control">{{$content->page_name}}</p>
    @endif
            <small class="text-danger">{{$errors->first('page_name')}}</small>
        </div>
    </div>
    <div class="form-actions">
        <div class="row"><br><br><br>
            <div class="col-md-offset-3 col-md-9"><br>
                {{Form::submit($text,['class'=>'btn green'])}}
                <a href="{{url('/lead/content')}}" type="button" class="btn default">Cancel</a>
            </div>
        </div>
    </div>

</div>