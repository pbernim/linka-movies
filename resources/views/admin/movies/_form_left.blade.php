<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	{{ Form::label('title', 'Title', ['class' => 'control-label']) }}
	{{ Form::text('title', null, array_merge(['class' => 'form-control'])) }}
	@if ($errors->has('title'))
		<span class="help-block">
		<strong>{{ $errors->first('title') }}</strong>
		</span>
	@endif
</div>

<div class="form-group{{ $errors->has('synopsis') ? ' has-error' : '' }}">
	{{ Form::label('synopsis', 'Synopsis', ['class' => 'control-label']) }}
	{{ Form::textarea('synopsis', null, array_merge(['id' => 'summernote'])) }}
	@if ($errors->has('synopsis'))
		<span class="help-block">
		<strong>{{ $errors->first('synopsis') }}</strong>
		</span>
	@endif
</div>