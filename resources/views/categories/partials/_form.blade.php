<!-- Name Form Input -->
<div class="form-group">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<span class="label label-danger">:message</span>') !!}
</div>
<!-- Slug Form Input -->
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<span class="label label-danger">:message</span>') !!}
</div>
<!-- Submit button -->
<div class="form-group">
  {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('categories.index') }}" class="btn btn-default">Back</a>
</div>