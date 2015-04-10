@extends('master')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@stop

@section('title', 'Platforms')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h1>Platforms</h1>
    </div>
    <div class="col-md-2">
        <br/>
        <a href="{{ route('platforms.create') }}"><button class="btn btn-info">New Platform</button></a>
    </div>
</div>

<table id="datatable" class="table table-bordered table-striped">
<thead>
    <th width="50">id</th>
    <th>Name</th>
    <th>Slug</th>
    <th>URL</th>
    <th width="140">Options</th>
</thead>
<tbody>
@unless(empty($platforms))
    @foreach($platforms as $platform)
    <tr>
        <td>{{$platform->id}}</td>
        <td>{{$platform->name}}</td>
        <td>{{$platform->slug}}</td>
        <td>{{$platform->url}}</td>
        <td>
        <a href="{{ route('platforms.edit', $platform->id)}}" class="btn btn-primary btn-sm pull-left" style="margin-right:5px">Edit</a>
        {!! Form::open(['route' => ['platforms.destroy', $platform->id], 'method' => 'DELETE' ]) !!}
            <button type="submit" class="btn btn-danger btn-sm" Onclick='return confirm("Are you sure you want to delete this platform?")'><i class="fa fa-trash"></i>Delete</button>
        {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
@endunless
</tbody>
</table>
@stop

@section('page-scripts')
    <script type="text/javascript" src="/assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@stop