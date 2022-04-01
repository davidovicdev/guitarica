@extends('admin.layouts.layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Activites</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    @if (count($activites) > 0)
                    <form action="{{route("adminpanel.activites")}}" method="GET">
                        <div class="form-group">
                            <label for="sort">Sort by:</label>
                            <select class="form-control" name="sort" id="sort">
                                <option value="asc" @if($sort == "asc") selected @endif>Date Ascending</option>
                                <option value="desc" @if($sort == "desc") selected @endif>Date Descending</option>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary mb-2" value="SORT">
                    </form>
                    
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Activity</th>
                                <th>Datetime</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activites as $activity)
                            <tr>
                                <td>{{$activity->name}}</td>
                                <td>{{$activity->created_at}}</td>
                                <td>
                                <button class="btn btn-danger remove-activity" data-id="{{$activity->id}}" >DELETE</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <h3 class="mt-2">No activites yet</h3>
                    @endif 
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->


@endsection