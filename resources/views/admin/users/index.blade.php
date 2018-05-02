@extends('admin.layout')
@section('title','User')
@section('content')
    <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">@yield('title')</span>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="{{loadAsset("lead/users/create")}}" class="btn green"> Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" id="users-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>School</th>
                    <th>Active</th>
                    <th>Type</th>
                    <th>Options</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>


@endsection
@section('scripts')

    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: false,
                searching: true,
                ajax: '{!! loadAsset('lead/users/dtAjax') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'Name' },
                    { data: 'school_id', name: 'School' },
                    { data: 'active', name: 'Active' },
                    { data: 'type',  name: 'Type' },
                    { data: 'control', name: 'Options' },
                ]
            });
        });
    </script>
@stop