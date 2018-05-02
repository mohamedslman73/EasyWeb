@extends("admin.layout")
@section('title',"facilities")
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
        {{Form::model($facility,['action'=>['admin\FacilitiesController@update',$facility->id],'method'=>'PATCH',"enctype"=>"multipart/form-data"])}}
        @include('admin.facilities._form',['text'=>'Update'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop