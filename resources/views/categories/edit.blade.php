@extends('master')

@section('title', 'Edit Category - ' . $category->name)

@section('content')

<h1>Edit Category</h1>

{!! Form::model($category,['route'=> ['categories.update', $category->id], 'method' => 'PATCH']) !!}

    @include('categories/partials/_form')

{!! Form::close() !!}

@stop