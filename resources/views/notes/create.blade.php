@extends('master')

@section('page-styles')
    <link href="{{ URL::asset('/css/select2.min.css') }}" rel="stylesheet" >
	<link href="{{ URL::asset('/css/summernote.css') }}" rel="stylesheet">
@stop

@section('title', 'New Note')

@section('content')

<h1>New Note</h1>

    <div class="col-md-10 note-form">

        {!! Form::model($note = new \Codestudy\Note, ['route'=>'notes.store', 'class'=>'horizontal-form']) !!}

            @include('notes.partials._form')

        {!! Form::close() !!}

    </div>



@stop

@section('page-scripts')

    <script src="{{ URL::asset('/js/summernote.min.js') }}"></script>
    <script src="{{ URL::asset('/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('/js/noteform.js') }}"></script>

@stop