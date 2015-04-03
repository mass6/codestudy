@extends('master')

@section('content')

<h1>Edit Platform</h1>

{!! Form::model($platform,['route'=> ['platforms.update', $platform->id], 'method' => 'PATCH']) !!}

    @include('platforms/partials/_form')

{!! Form::close() !!}

@stop