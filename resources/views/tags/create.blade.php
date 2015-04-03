@extends('master')

@section('content')

<h1>New Tag</h1>

{!! Form::open(['route'=>'tags.store']) !!}

    @include('tags/partials/_form')

{!! Form::close() !!}

@stop