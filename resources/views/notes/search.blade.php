@extends('master')

@section('page-styles')
    <link rel="stylesheet" href="{{ URL::asset('css/railcasts.min.css') }}">
    <link rel="stylesheet" type="text/css" href="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@stop

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h3>Search Results for: <em><text class="text text-warning ">"{{ $search }}"</text></em></h3>
        </div>
        <div class="col-md-2">
            <br/>
            <a href="{{ route('notes.create') }}"><button class="btn btn-info">New Note</button></a>
        </div>
    </div>
    @if(count($notes))
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <th width="50">id</th>
                <th>Title</th>
                <th>Type</th>
                <th>Category</th>
                <th>Hit Count</th>
                <th>Body</th>
                <th width="140">Options</th>
            </thead>
            <tbody>
                @foreach($notes as $note)
                <tr>
                    <td>{{$note->id}}</td>
                    <td><a href="{{ route('notes.show', $note->id) }}">{{$note->title}}</a></td>
                    <td>{{$note->type}}</td>
                    <td>{{$note->category->name}}</td>
                    <td>{{$note->rank}}</td>
                    <td>{!! str_limit($note->body, 200, '...') !!}</td>
                    <td>
                        <a href="{{ route('notes.edit', $note->id)}}" class="btn btn-primary btn-sm pull-left" style="margin-right:5px">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h4><span class="text text-danger" style="margin-left: 20px;"><em>No results match your search request.</em></span></h4>
        @endif

@stop

@section('page-scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>

    <script type="text/javascript" src="/assets/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
@stop