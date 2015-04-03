@extends('master')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        <h1>Languages</h1>
    </div>
    <div class="col-md-2">
        <br/>
        <a href="{{ route('languages.create') }}"><button class="btn btn-info">New Language</button></a>
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
@unless(empty($languages))
    @foreach($languages as $language)
    <tr>
        <td>{{$language->id}}</td>
        <td>{{$language->name}}</td>
        <td>{{$language->slug}}</td>
        <td><a href="{{ url($language->url) }}" target="_blank">{{ $language->url }}</a></td>
        <td>
        <a href="{{ route('languages.edit', $language->id)}}" class="btn btn-primary btn-sm pull-left" style="margin-right:5px">Edit</a>
        {!! Form::open(['route' => ['languages.destroy', $language->id], 'method' => 'DELETE' ]) !!}
            <button type="submit" class="btn btn-danger btn-sm" Onclick='return confirm("Are you sure you want to delete this language?")'><i class="fa fa-trash"></i>Delete</button>
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