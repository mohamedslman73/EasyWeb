<div id="exTab2">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#school" data-toggle="tab">districts Data</a></li>
    </ul>
    <div class="tab-content ">
        <div class="tab-pane active" id="school">

<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} District</h3></div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Arabic Name</label>
        <div class="col-md-9">
            {{Form::text('name_ar',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name_ar')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">English Name</label>
        <div class="col-md-9">
            {{Form::text('name_en',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name_en')}}</small>
        </div>
    </div><br><br>


    <div class="form-group">
        <label class="control-label col-md-3">Related City</label>
        <div class="col-md-9">
            {{Form::select('city_id',$cities,null,['class'=>'form-control select2'])}}
        </div>
    </div>

    <br><br>
</div>
        </div>


        <div class="clear-fix"></div>


        <div class="form-actions">
        <div class="row">
            <br>
            <div class="col-md-offset-3 col-md-9">
                {{Form::submit($text,['class'=>'btn green'])}}
                <a href="{{url('/lead/districts')}}" type="button" class="btn default">Cancel</a>
            </div>
        </div>
    </div>

</div>
</div>