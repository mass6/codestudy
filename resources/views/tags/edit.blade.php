@extends('master')

@section('title', 'Edit Tag - ' . $tag->name)

@section('content')

<h1>Edit Tag</h1>

{!! Form::model($tag,['route'=> ['tags.update', $tag->id], 'method' => 'PATCH']) !!}

    @include('tags/partials/_form')

{!! Form::close() !!}

@stop