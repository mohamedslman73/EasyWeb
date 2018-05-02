@extends("admin.layout")

@section('title',"site option")

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
        {{Form::open(['action'=>'admin\SiteSeoOptionController@store','files'=>true,"enctype"=>"multipart/form-data"])}}
        @include('admin.siteoption._form',['text'=>'Create'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop