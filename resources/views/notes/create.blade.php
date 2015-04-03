@extends('master')

@section('page-styles')

    <link href="{{ URL::asset('/css/select2.min.css') }}" rel="stylesheet" >
	<link href="{{ URL::asset('/css/summernote.css') }}" rel="stylesheet">

@stop

@section('content')

<h1>New Note</h1>

    <div class="col-md-10" style="background-color:white">

        {!! Form::model($note = new \Codestudy\Note, ['route'=>'notes.store', 'class'=>'horizontal-form']) !!}

            @include('notes.partials._form')

        {!! Form::close() !!}

    </div>



@stop

@section('page-scripts')

    <script src="{{ URL::asset('/js/summernote.min.js') }}"></script>
    <script src="{{ URL::asset('/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">

        (function tango() {
            $(".select2").select2({
              tags: true
            })

            $( ".select2" )
              .change(function() {
                var str = "";
                $( ".select2 option:selected" ).each(function() {
                  str += $( this ).text() + ", ";
                });
              });


              $('.summernote').summernote({
                height: 150
              })

        }());
    </script>

@stop