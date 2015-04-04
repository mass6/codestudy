@extends('...master')

@section('page-styles')
    <link rel="stylesheet" href="{{ URL::asset('css/railcasts.min.css') }}">
@stop

@section('content')

<h1>{{ $note->title }}</h1>
<br/>
<article>{!! $note->body !!}</article>
@unless(empty($note->url))
    <br/>
    <p>
    <h4 class="label label-primary">Resource URL:</h4>
        <br/>
        {!! link_to($note->url, $note->url, ['target' => 'blank']) !!}
    </p>
@endunless
<hr/>
<div class="row note-attributes">
    <h3>Metadeta</h3>
    <div class="col-md-2">
        <h5>Type</h5>
        <span>{{$note->type}}</span>
    </div>
    <div class="col-md-2">
        <h5>Category</h5>
        <span>{{$note->category->name}}</span>
    </div>
    <div class="col-md-2">
        <h5>Platforms</h5>
        <ul>
            @foreach($note->platforms as $platform)
                <li>{{ $platform->name }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-2">
        <h5>Languages</h5>
        <ul>
            @foreach($note->languages as $language)
                <li>{{ $language->name }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-2">
        <h5>Frameworks</h5>
        <ul>
            @foreach($note->frameworks as $framework)
                <li>{{ $framework->name }}</li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-2">
        <h5>Tags</h5>
        <ul>
            @foreach($note->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
<hr/>
<div class="row">
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