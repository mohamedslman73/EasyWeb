{{--
{{dd($errors)}}
--}}

<div id="exTab2">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#school" data-toggle="tab">Partner Data</a></li>
    </ul>
    <div class="tab-content ">
        <div class="tab-pane active" id="school">

<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} Partner</h3></div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Arabic Name</label>
        <div class="col-md-9">
            {{Form::text('name_ar',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name_ar')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">English Name</label>
        <div class="col-md-9">
            {{Form::text('name_en',null,['class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('name_en')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Image</label>
        <div class="col-md-9">
            @if(@$partner && $partner->logo != '')
                <div class="col-md-9"  >
                    <img src="{{loadAsset('uploads/'.$partner->logo)}}" style="height: 100px" alt="{{$partner->name_en}}">
                </div>
            @endif
            {{Form::file('log',['class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('log')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Facebook</label>
        <div class="col-md-9">
            {{Form::text('facebook',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('facebook')}}</small>
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Instagram</label>
        <div class="col-md-9">
            {{Form::text('instagram',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('instagram')}}</small>
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Youtube</label>
        <div class="col-md-9">
            {{Form::text('youtube',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('youtube')}}</small>
        </div>
    </div>
   <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Linkedin</label>
        <div class="col-md-9">
            {{Form::text('linkedin',null,['autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('linkedin')}}</small>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Arabic About</label>
        <div class="col-md-9">
            {{Form::textarea('about_ar',null,['rows'=>3,'autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('about_ar')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">English About</label>
        <div class="col-md-9">
            {{Form::textarea('about_en',null,['rows'=>3,'autocompelete'=>'off','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('about_en')}}</small>
        </div>
    </div>

</div>
        </div>


        <div class="clear-fix"></div>



    <div class="form-actions">
        <div class="row"><br><br><br>
            <div class="col-md-offset-3 col-md-9"><br>
                {{Form::submit($text,['class'=>'btn green'])}}
                <a href="{{url('/lead/partners')}}" type="button" class="btn default">Cancel</a>
            </div>
        </div>
    </div>

</div>

</div>