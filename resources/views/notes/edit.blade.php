@extends('master')

@section('page-styles')

    <link href="{{ URL::asset('/css/select2.min.css') }}" rel="stylesheet" >
	<link href="{{ URL::asset('/css/summernote.css') }}" rel="stylesheet">

@stop

@section('title', 'Edit Note - ' . $note->title)

@section('content')


<h1>Edit Note</h1>

    <div class="col-md-10" style="background-color:white">

        {!! Form::model($note, ['route'=>['notes.update', $note->id], 'class'=>'horizontal-form', 'method' => 'PATCH']) !!}

            @include('notes.partials._form')

        {!! Form::close() !!}

    </div>



@stop

@section('page-scripts')

    <script src="{{ URL::asset('/js/summernote.min.js') }}"></script>
    <script src="{{ URL::asset('/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('/js/noteform.js') }}"></script>

@stop