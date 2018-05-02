<div class="form-body">
    <div class="font-blue-soft"><h3 class="form-section">{{$text}} Articles</h3></div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Title</label>
        <div class="col-md-9">
            {{Form::text('title_ar',null,['placeholder'=>'Arabic title', 'class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('title_ar')}}</small>
            {{Form::text('title_en',null,['placeholder'=>'English title','class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('title_en')}}</small>
        </div>
    </div>
            @if($text=="Update")
                <div class="form-group">
                    <label class="control-label col-md-3" for="inputWarning"></label>
                    <div class="col-md-9">
                         <img style="width: 50px; height: 50px" src="{{asset('/uploads/'.$article->logo)}}">
                    </div>
                </div>
            @endif
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Logo</label>
        <div class="col-md-9">
            {{Form::file('log',['class'=>'form-control'])}}
            <small class="text-danger">{{$errors->first('log')}}</small>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="inputWarning">Article Text</label>
        <div class="col-md-9">
            {{Form::textarea('text_ar',null,['id'=>'ckview','placeholder'=>'English text','rows'=>5,'class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('log')}}</small>
            {{Form::textarea('text_en',null,['id'=>'ckview2','placeholder'=>'English text','rows'=>5,'class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('log')}}</small>
        </div>
    </div>
  {{--  <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Article Text</label>
        --}}{{--<div class="col-md-9">
            {{Form::textarea('text_ar',null,['placeholder'=>'Arabic text','rows'=>5,'class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('text_ar')}}</small>
            {{Form::textarea('text_en',null,['placeholder'=>'English text','rows'=>5,'class'=>'form-control','required'])}}
            <small class="text-danger">{{$errors->first('text_en')}}</small>
        </div>--}}{{--
            <div class="col-md-9">
                <!-- BEGIN EXTRAS PORTLET-->
                <div class="portlet-body form" >
                    <form class="form-horizontal form-bordered">
                        <div class="form-body">
                            <div class="form-group last">
                                <div class="col-md-12">
                                    <div name="summernote" id="summernote_1"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">

                        </div>
                    </form>
                </div>
            </div>
    </div>--}}
    <div class="form-group">
        <label class="control-label col-md-3" for="inputError">Articles Gallery</label>
        <div class="input-group col-md-8">
                @if(@$article && $article->article_files != '')
            <p class="edit" style="border: none;background: inherit; position:absolute;top: 5px; right: -60px;margin-top: 10px;"><i class="fa fa-pencil fa-2x" style="color: green"></i></p>
            <div class="col-md-12">
                    @foreach($article->article_files as $image )
                           <div class="col-md-3">
                            <img src="{{loadAsset('uploads/'.$image->image)}}" style="width: 100px;height:  100px;">
                            <a href="{{loadAsset("lead/articles/deleteFile/".$image->id)}}"><i class="fa fa-times fa" style="font-size: 20px; position:absolute;"></i></a>
                           </div>
                            <div class="form-group imageEdit" style=" display: none;overflow: hidden;">
                                   {{csrf_field()}}
                                   <input type="hidden" name="image_id[]" class="form-control" value="{{$image->id}}">
                                {{--<input type="hidden" name="old_image[]" class="form-control" value="{{$image->image}}">--}}
                                <p style="margin:0">ar</p>
                                {{Form::textarea('edit_img_text_ar[]',$image->img_text_ar,['placeholder'=>'English text','rows'=>5,'class'=>'form-control'])}}
                                <p style="margin:0">en</p>
                                {{Form::textarea('edit_img_text_en[]',$image->img_text_en,['placeholder'=>'English text','rows'=>5,'class'=>'form-control'])}}
                            </div>
                    @endforeach
            </div>
                @endif
            <div class="col-md-12">
                <span class="input-group-btn">
                <input type="file" name="images[]" class="form-control">
                    <button class="btn btn-default addImages" type="button"><i class="fa fa-plus"></i></button>
                    <textarea rows="4" name="img_text_ar[]" placeholder="Arabic Image Description" class="form-control"></textarea>
                    <textarea rows="4" name="img_text_en[]" placeholder="English Image Description" class="form-control"></textarea>
                </span>
            </div>
        </div>
    </div>
    <div id="imageWrapper"></div>

    <div class="form-actions">
        <div class="row"><br><br><br>
            <div class="col-md-offset-3 col-md-9"><br>
                {{Form::submit($text,['class'=>'btn green'])}}
                <a href="{{url('/lead/articles')}}" type="button" class="btn default">Cancel</a>
            </div>
        </div>
    </div>

</div>
@section('scripts')
<script>
$('.edit').on('click',function () {
$('.imageEdit').toggle();
})    
</script>
<script>
    $('.addImages').on('click',function () {
        $('#imageWrapper').append('<div class="form-group col-md-12"> \n' +
            '                <label class="control-label col-md-3" for="inputError"></label>\n' +
            '                <div class="input-group col-md-8">\n' +
            '                    <div class="col-md-12">\n' +
            '                    <span class="input-group-btn">\n' +
            '                        <input type="file" name="images[]" class="form-control">\n' +
            '                        <button class="btn btn-default removeImage" type="button"><i class="fa fa-times"></i></button>\n' +
            '                        <textarea rows="4" placeholder="Arabic Image Description" name="img_text_ar[]" class="form-control"></textarea>\n' +
            '                        <textarea rows="4" placeholder="English Image Description"name="img_text_en[]" class="form-control"></textarea>\n' +
            '                    </span>\n' +
            '                </div>\n' +
            '                </div>\n' +
            '            </div>')

    })
    $(document).on('click','.removeImage',function () {
        $(this).parent().parent().parent().parent().remove();
    })
    $(document).ready(function () {
        initRegions("{{($text == 'Update')?"edit":"add"}}");
    });
</script>
@endsection