@extends('master')

@section('content')

<h1>New Language</h1>

{!! Form::open(['route'=>'languages.store']) !!}

    @include('languages/partials/_form')

{!! Form::close() !!}

@stop