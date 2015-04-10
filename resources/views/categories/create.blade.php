@extends('master')

@section('title', 'New Category')

@section('content')

<h1>New Category</h1>

{!! Form::open(['route'=>'categories.store']) !!}

    @include('categories/partials/_form')

{!! Form::close() !!}

@stop