@extends("admin.layout")
@section('title',"Cities")
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
        {{Form::model($city,['action'=>['admin\CitiesController@update',$city->id],'method'=>'PATCH','files'=>true,"enctype"=>"multipart/form-data"])}}
        {{csrf_field()}}
        @include('admin.cities._form',['text'=>'Update'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop


