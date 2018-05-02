@extends("admin.layout")
@section('title',"Articles")
@section('script')
    <script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
    <script src="{{url('ckeditor/ckeditor.js')}}"></script>
    <script>
        var ckview = document.getElementById("ckview");
        CKEDITOR.replace(ckview,{
            language:'en-gb'
        });
        var ckview = document.getElementById("ckview2");
        CKEDITOR.replace(ckview,{
            language:'en-gb'
        });
    </script>
@endsection
@section("content")
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">@yield('title')</span>
            </div>
        </div>

        <div class="portlet-body">
            <!-- BEGIN FORM-->
        {{Form::model($article,['action'=>['admin\ArticlesController@update',$article->id],'method'=>'PATCH','files'=>true,"enctype"=>"multipart/form-data"])}}
        {{csrf_field()}}
        @include('admin.articles._form',['text'=>'Update'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop