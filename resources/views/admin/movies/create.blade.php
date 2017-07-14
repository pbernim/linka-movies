@extends('layouts.backend')

@section('content')

<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Add a new movie</h4> 
					</div>
					<div class="panel-body">
					{!! Form::open(array('route' => 'movies.store', 'method'=>'POST', 'files' => true)) !!}
						<div class="row">
							<div class="col-sm-8">
								@include('admin.movies._form_left')
								<div class="btn-group btn-block">
									{!! Form::submit('Create', ['class' => 'btn btn-success btn-sm btn-block']) !!}
									<a href="{{ url(Session::get('full_url_page')) }}" class="btn btn-default btn-sm btn-block">Cancel
                                    </a>
								</div>
							</div>
							<div class="col-sm-4">
								@include('admin.movies._form_right')
							</div>
						</div>
					{!! Form::close() !!}
					</div>
				</div>				
			</div>
		</div>
	</div>

@endsection