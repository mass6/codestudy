            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            {!! Form::text('title', null, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Note title']) !!}
                            {!! $errors->first('title', '<span class="label label-danger">:message</span>') !!}

                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                	<div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Note</label>
                            {!! Form::textarea('body', null, ['class'=>'form-control summernote']) !!}
                        </div>
                        {!! $errors->first('body', '<span class="label label-danger">:message</span>') !!}

                    </div>
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="note">Note</option>
                                <option value="snippet">Snippet</option>
                                <option value="tutorial">Tutorial</option>
                                <option value="resource">Resource</option>
                            </select>
                            {!! $errors->first('type', '<span class="label label-danger">:message</span>') !!}
                            <span class="help-block">
                            What type of note is this? </span>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <!-- Categories Form Input -->
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                            {!! $errors->first('category_id', '<span class="label label-danger">:message</span>') !!}
                            <span class="help-block">
                            What category does this belong to? </span>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Platform</label>
                            {!! Form::select('platforms[]', $platforms, $note->platforms()->lists('id'), ['class'=>'form-control select2', 'multiple']) !!}
                            {!! $errors->first('platforms', '<span class="label label-danger">:message</span>') !!}
                            <span class="help-block">
                            What platform(s) is this related to? </span>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Language</label>
                            {!! Form::select('languages[]', $languages, $note->languages()->lists('id'), ['class'=>'form-control select2', 'multiple']) !!}
                            {!! $errors->first('languages', '<span class="label label-danger">:message</span>') !!}
                            <span class="help-block">
                            What language(s)/markup is this related to? </span>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">Framework</label>
                            {!! Form::select('frameworks[]', $frameworks, $note->frameworks()->lists('id'), ['class'=>'form-control select2', 'multiple']) !!}
                            {!! $errors->first('frameworks', '<span class="label label-danger">:message</span>') !!}
                            <span class="help-block">
                            What framework(s) is this related to? </span>
                        </div>
                    </div>
                    <!--/span-->
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">URL</label>
                            {!! Form::text('url', null, ['class'=>'form-control', 'id'=>'url']) !!}
                            {!! $errors->first('url', '<span class="label label-danger">:message</span>') !!}

                            <span class="help-block">
                            Link or reference URL </span>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tags</label>
                            {!! Form::select('tags[]', $tags, $note->tags()->lists('id'), ['class'=>'form-control select2', 'multiple']) !!}
                            {!! $errors->first('tags', '<span class="label label-danger">:message</span>') !!}
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
            </div>
            <div class="form-actions pull-right">
                <a href="{{ route('notes.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn bg-primary"><i class="fa fa-check"></i> Save</button>
            </div>