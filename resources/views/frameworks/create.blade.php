@extends('master')

@section('title', 'New Framework')

@section('content')

<h1>New Framework</h1>

{!! Form::open(['route'=>'frameworks.store']) !!}

    @include('frameworks/partials/_form')

{!! Form::close() !!}

@stop