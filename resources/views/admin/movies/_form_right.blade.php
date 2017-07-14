<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
	<h5><strong>Movie poster</strong></h5>
	@php($poster = isset($movie->poster) ? $movie->poster : 'default.jpg')
	
	<div id="image-holder">
		<img src="{{ Storage::url($poster) }}" class="img-thumbnail">
	</div>
	<label class="btn btn-default btn-file btn-sm btn-block">
		<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;Upload file
    	{{ Form::file('image', ['id'=>'fileUpload', 'style' => 'display: none;']) }}
	</label>

	@if ($errors->has('image'))
		<span class="help-block">
		<strong>{{ $errors->first('image') }}</strong>
		</span>
	@else
		<p class="help-block"><small>Maximum jpeg file size 2M.</small></p>	
	@endif
</div>
