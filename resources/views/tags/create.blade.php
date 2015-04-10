@extends('master')

@section('title', 'New Tag')

@section('content')

<h1>New Tag</h1>

{!! Form::open(['route'=>'tags.store']) !!}

    @include('tags/partials/_form')

{!! Form::close() !!}

@stop