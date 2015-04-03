@extends('master')

@section('content')

<h1>Edit Framework</h1>

{!! Form::model($framework,['route'=> ['frameworks.update', $framework->id], 'method' => 'PATCH']) !!}

    @include('frameworks/partials/_form')

{!! Form::close() !!}

@stop