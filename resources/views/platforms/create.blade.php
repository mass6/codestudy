@extends('master')

@section('content')

<h1>New Platform</h1>

{!! Form::open(['route'=>'platforms.store']) !!}

    @include('platforms/partials/_form')

{!! Form::close() !!}

@stop