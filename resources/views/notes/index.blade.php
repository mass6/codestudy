@extends('master')

@section('page-styles')
    <link rel="stylesheet" type="text/css" href="/assets/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@stop

@section('content')

<div class="row">
    <div class="col-md-10">
        <h1>Notes</h1>
    </div>
    <div class="col-md-2">
        <br/>
        <a href="{{ route('notes.create') }}"><button class="btn btn-info">New Note</button></a>
    </div>
</div>
<table id="datatable" class="table table-bordered table-striped">
    <thead>
        <th width="50">id</th>
        <th>Title</th>
        <th>Type</th>
        <th>Category</th>
        <th>Platforms</th>
        <th>Languages</th>
        <th>Frameworks</th>
        <th>Tags</th>
        <th width="140">Options</th>
    </thead>
    <tbody>
    @unless(empty($notes))
        @foreach($notes as $note)
        <tr>
            <td>{{$note->id}}</td>
            <td><a href="{{ route('notes.show', $note->id) }}">{{$note->title}}</a></td>
            <td>{{$note->type}}</td>
            <td>{{$note->category->name}}</td>
            <td>
                 @unless($note->platforms->isEmpty())
                     <small>
                        @for($i = 0; $i < $note->platforms->count(); $i++)
                                @if($i < $note->platforms->count() - 1)
                                    {{ $note->platforms[$i]->name }},&nbsp;
                                @else
                                    {{ $note->platforms[$i]->name }}
                                @endif
                        @endfor
                     </small>
                 @endunless
            </td>
            <td>
                 @unless($note->languages->isEmpty())
                     <small>
                        @for($i = 0; $i < $note->languages->count(); $i++)
                                @if($i < $note->languages->count() - 1)
                                    {{ $note->languages[$i]->name }},&nbsp;
                                @else
                                    {{ $note->languages[$i]->name }}
                                @endif
                        @endfor
                     </small>
                 @endunless
            </td>
            <td>
                 @unless($note->frameworks->isEmpty())
                     <small>
                        @for($i = 0; $i < $note->frameworks->count(); $i++)
                                @if($i < $note->frameworks->count() - 1)
                                    {{ $note->frameworks[$i]->name }},&nbsp;
                                @else
                                    {{ $note->frameworks[$i]->name }}
                                @endif
                        @endfor
                     </small>
                 @endunless
            </td>
            <td>
                 @unless($note->tags->isEmpty())
                     <small>
                        @for($i = 0; $i < $note->tags->count(); $i++)
                                @if($i < $note->tags->count() - 1)
                                    {{ $note->tags[$i]->name }},&nbsp;
                                @else
                                    {{ $note->tags[$i]->name }}
                                @endif
                        @endfor
                     </small>
                 @endunless
            </td>
            <td>
            <a href="{{ route('notes.edit', $note->id)}}" class="btn btn-primary btn-sm pull-left" style="margin-right:5px">Edit</a>
            {!! Form::open(['route' => ['notes.destroy', $note->id], 'method' => 'DELETE' ]) !!}
                <button type="submit" class="btn btn-danger btn-sm" Onclick='return confirm("Are you sure you want to delete this note?")'><i class="fa fa-trash"></i> Delete</button>
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
            $('#datatable').DataTable({
                "order": [[ 0, "desc" ]]
            });
        } );
    </script>
@stop