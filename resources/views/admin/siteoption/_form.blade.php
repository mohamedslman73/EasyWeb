{{--{{dd($errors)}}--}}
<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} site option</h3></div>



    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">title</label>
        <div class="col-md-9">
            @if($text!='Update')
            {{Form::textarea('title',null,['rows'=>3,'class'=>'form-control'])}}
            @else
                <p class='form-control'>{{$siteoption->title}}</p>
            @endif

            <small class="text-danger">{{$errors->first('title')}}</small>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Meta Description Ar</label>
        <div class="col-md-9">
            {{Form::textarea('meta_description_ar',null,['rows'=>3,'class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('meta_description_ar')}}</small>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Meta Description En</label>
        <div class="col-md-9">
            {{Form::textarea('meta_description_en',null,['rows'=>3,'class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('meta_description_en')}}</small>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Meta Keywords Ar</label>
        <div class="col-md-9">
            {{Form::textarea('meta_keywords_ar',null,['rows'=>3,'class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('meta_keywords_ar')}}</small>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Meta Keywords En</label>
        <div class="col-md-9">
            {{Form::textarea('meta_keywords_en',null,['rows'=>3,'class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('meta_keywords_en')}}</small>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Social Description</label>
        <div class="col-md-9">
            {{Form::textarea('social_description',null,['rows'=>3,'class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('social_description')}}</small>
        </div>
    </div>




        <div class="form-actions">
            <div class="row"><br><br><br>
                <div class="col-md-offset-3 col-md-9"><br>
                    {{Form::submit($text,['class'=>'btn green'])}}
                    <a href="{{url('/lead/siteoption')}}" type="button" class="btn default">Cancel</a>
                </div>
            </div>
        </div>

    </div>
