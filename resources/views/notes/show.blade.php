@extends('...master')

@section('page-styles')
    <link rel="stylesheet" href="{{ URL::asset('css/railcasts.min.css') }}">
@stop

@section('content')

<h1>{{ $note->title }}</h1>

<article>{!! $note->body !!}</article>

<br/>
<div>
<a href="{{ route('notes.index') }}" class="btn btn-default">Back</a>
<a href="{{ route('notes.edit', $note->id) }}" class="btn btn-primary">Edit</a>
</div>

@stop

@section('page-scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.4/highlight.min.js"></script>
    <script>
        hljs.configure({
          tabReplace: '    '
        });
        $("pre").each(function (i, e) {
            hljs.highlightBlock(e);
        });
    </script>
@stop