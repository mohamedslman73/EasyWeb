@extends('admin.layout')
@section('title','Facilities')
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
                            <a href="{{loadAsset("lead/facilities/create")}}" class="btn green"> Add New
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
                    <th>Arabic Name</th>
                    <th>English Name</th>
                    <th>Types</th>
                    <th>Active</th>
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
                ajax: '{!! loadAsset('lead/facilities/dtAjax')!!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name_ar', name: 'Arabic Name' },
                    { data: 'name_en', name: 'English Name' },
                    { data: 'facility_type_id', name: 'Type' },
                    { data: 'status', name: 'Active' },
                    { data: 'control', name: 'Options' },
                ]
            });
        });
    </script>
@stop