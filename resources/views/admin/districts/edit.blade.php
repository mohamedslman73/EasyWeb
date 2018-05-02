@extends("admin.layout")
@section('title',"Districts")
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
        {{Form::model($district,['action'=>['admin\DistrictsController@update',$district->id],'method'=>'PATCH',"enctype"=>"multipart/form-data"])}}
        {{csrf_field()}}
        @include('admin.districts._form',['text'=>'Update'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop