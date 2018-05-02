@extends("admin.layout")
@section('title',"Images")
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
        {{Form::open(['action'=>'admin\MainImagesController@store','files'=>true])}}
        {{csrf_field()}}

        @include('admin.mainImages._form',['text'=>'Create'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop