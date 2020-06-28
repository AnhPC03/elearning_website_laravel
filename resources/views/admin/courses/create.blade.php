@extends('admin.app')

@section('content')
<div class="container">
	@if(count($errors) > 0)
		<div class="alert alert-danger">
			Upload error
			<ul>
				@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
				<li>
					The file must be in correct extension.
				</li>
			</ul>
		</div>
	@endif
	@if(Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong> {{ Session::get('success') }}</strong>
		</div>
	@endif
	<div class="row justify-content-center">
	    <div class="col-md-8">
	        <div class="card">
	            <div class="card-header">{{ __('Create new course') }}</div>

	            <div class="card-body">
	                <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
	                    @csrf

	                    <div class="form-group row">
	                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

	                        <div class="col-md-6">
	                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

	                        <div class="col-md-6">
	                            <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description">
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

	                        <div class="col-md-6">
	                            <input id="image" type="file" class="form-control" name="image" value="{{ old('image') }}" required autocomplete="image" style="height: 100%;">
	                        </div>
	                    </div>

	                    <div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <button type="submit" class="btn btn-primary">
	                                {{ __('Add new course') }}
	                            </button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection