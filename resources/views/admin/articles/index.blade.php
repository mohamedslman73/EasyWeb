@extends('admin.layout')
@section('title','Articles')
@section('content')
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                <a href="{{loadAsset("lead/articles/create")}}" class="btn green"> Add New
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                    <thead>
                    <tr>
                        <th> id </th>
                        <th> Arabic Name </th>
                        <th> English Name</th>
                        <th> Edit </th>
                        <th> Delete </th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td> {{$article->id}} </td>
                        <td> {{$article->title_ar}}</td>
                        <td> {{$article->title_en}}</td>
                        <td>
                            <a class="btn btn-primary" href="/lead/articles/{{$article->id}}/edit"> Edit </a>
                        </td>
                        <td>
                            <form action="/lead/articles/{{$article->id}}" method="post">
                                {{csrf_field()}}
                             <input type="hidden" name="_method" value="DELETE">
                             <input onclick="return confirm('Are you sure to DELETE this Record ?')" type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>


@endsection
@section('scripts')
<script>
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
  {{--  <script>
        $(function() {
            $('#users-table').DataTable({
                processing: false,
                searching: true,
                ajax: '{!! loadAsset('lead/articles/dtAjax') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title_en', name: 'English Title' },
                    { data: 'title_ar', name: 'English Title' },
                    { data: 'control', name: 'Options' },
                ]
            });
        });
    </script>--}}
@stop