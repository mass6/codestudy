@extends('...master')

@section('page-styles')
    <link rel="stylesheet" href="{{ URL::asset('css/railcasts.min.css') }}">
@stop

@section('title', $note->title)

@section('content')

<h1>{{ $note->title }}</h1>
<br/>
<div class="well note-body">
    <article>{!! $note->body !!}</article>
</div>
@unless(empty($note->url))
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Resource URL:</h3>
      </div>
      <div class="panel-body">
        {!! link_to($note->url, $note->url, ['target' => 'blank']) !!}
      </div>
    </div>
@endunless

<div class="note-attributes">

    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title">Metadeta</h3>
      </div>
      <div class="panel-body">

        <div class="col-md-2">
            <h4 class="note-metedata">Type</h4>
            <span class="label label-info meta">{{$note->type}}</span>
        </div>
        <div class="col-md-2">
            <h4 class="note-metedata">Category</h4>
            <span class="label label-info meta">{{$note->category->name}}</span>
        </div>
        <div class="col-md-2">
            <h4 class="note-metedata">Platforms</h4>
            <ul class="list-unstyled meta">
                @foreach($note->platforms as $platform)
                    <li><span class="label label-info">{{ $platform->name }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-2">
            <h4 class="note-metedata">Languages</h4>
            <ul class="list-unstyled meta">
                @foreach($note->languages as $language)
                    <li><span class="label label-info">{{ $language->name }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-2">
            <h4 class="note-metedata">Frameworks</h4>
            <ul class="list-unstyled meta">
                @foreach($note->frameworks as $framework)
                    <li><span class="label label-info">{{ $framework->name }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-2">
            <h4 class="note-metedata">Tags</h4>
            <ul class="list-unstyled meta">
                @foreach($note->tags as $tag)
                    <li><span class="label label-info">{{ $tag->name }}</span></li>
                @endforeach
            </ul>
        </div>

      </div>
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
    <script src="{{ URL::asset('/js/highlight.init.js') }}"></script>
@stop