@extends("admin.layout")
@section('title',"Schools")
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
        {{Form::model($school,['action'=>['admin\SchoolsController@update',$school->id],'method'=>'PATCH','files'=>true,"enctype"=>"multipart/form-data"])}}
        @include('admin.schools._form',['text'=>'Update'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop