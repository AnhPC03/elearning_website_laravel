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
	            <div class="card-header">{{ __('Create new exercise') }}</div>

	            <div class="card-body">
	                <form method="POST" action="{{ route('exercises.store', [$id_course, $id]) }}">
	                    @csrf

	                    <div class="form-group row">
	                        <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>

	                        <div class="col-md-6">
	                            <input id="question" type="text" class="form-control" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="choice1" class="col-md-4 col-form-label text-md-right">{{ __('Choice 1') }}</label>

	                        <div class="col-md-6">
	                            <input id="choice1" type="text" class="form-control" name="choice1" value="{{ old('choice1') }}" required autocomplete="choice1">
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="choice2" class="col-md-4 col-form-label text-md-right">{{ __('Choice 2') }}</label>

	                        <div class="col-md-6">
	                            <input id="choice2" type="text" class="form-control" name="choice2" value="{{ old('choice2') }}" required autocomplete="choice2">
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="choice3" class="col-md-4 col-form-label text-md-right">{{ __('Choice 3') }}</label>

	                        <div class="col-md-6">
	                            <input id="choice3" type="text" class="form-control" name="choice3" value="{{ old('choice3') }}" required autocomplete="choice3">
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="choice4" class="col-md-4 col-form-label text-md-right">{{ __('Choice 4') }}</label>

	                        <div class="col-md-6">
	                            <input id="choice4" type="text" class="form-control" name="choice4" value="{{ old('choice4') }}" required autocomplete="choice4">
	                        </div>
	                    </div>
	                    <div class="form-group row">
	                        <label for="answer" class="col-md-4 col-form-label text-md-right">{{ __('Answer label choose') }}</label>

	                        <div class="col-md-6">
	                            <input id="answer" type="text" class="form-control" name="answer" value="{{ old('answer') }}" required autocomplete="answer" style="height: 100%;">
	                        </div>
	                    </div>

	                    <div class="form-group row mb-0">
	                        <div class="col-md-6 offset-md-4">
	                            <button type="submit" class="btn btn-primary">
	                                {{ __('Add new exercise') }}
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