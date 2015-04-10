@extends('master')

@section('title', 'Edit Language - ' . $languages->name)

@section('content')

<h1>Edit Language</h1>

{!! Form::model($language,['route'=> ['languages.update', $language->id], 'method' => 'PATCH']) !!}

    @include('languages/partials/_form')

{!! Form::close() !!}

@stop