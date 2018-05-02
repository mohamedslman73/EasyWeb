@extends("admin.layout")
@section('title',"Partner")
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
        {{Form::model($partner,['action'=>['admin\PartnersController@update',$partner->id],'method'=>'PATCH','files'=>true,"enctype"=>"multipart/form-data"])}}
        {{csrf_field()}}
        @include('admin.partners._form',['text'=>'Update'])
        {{Form::close()}}
        <!-- END FORM-->
        </div>
    </div>

@stop