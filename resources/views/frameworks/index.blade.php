@extends('master')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@stop

@section('title', 'Frameworks')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h1>Frameworks</h1>
    </div>
    <div class="col-md-2">
        <br/>
        <a href="{{ route('frameworks.create') }}"><button class="btn btn-success">New Framework</button></a>
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
@unless(empty($frameworks))
    @foreach($frameworks as $framework)
    <tr>
        <td>{{$framework->id}}</td>
        <td>{{$framework->name}}</td>
        <td>{{$framework->slug}}</td>
        <td><a href="{{ url($framework->url) }}" target="_blank">{{ $framework->url }}</a></td>
        <td>
        <a href="{{ route('frameworks.edit', $framework->id)}}" class="btn btn-warning btn-sm pull-left" style="margin-right:5px">Edit</a>
        {!! Form::open(['route' => ['frameworks.destroy', $framework->id], 'method' => 'DELETE' ]) !!}
            <button type="submit" class="btn btn-danger btn-sm" Onclick='return confirm("Are you sure you want to delete this framework?")'><i class="fa fa-trash"></i>Delete</button>
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