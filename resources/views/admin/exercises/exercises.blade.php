@extends('admin.app')

@section('content')
<div class="container">
	<span><h1 style="color: blue;">{{ $numExercises }} Exercises</h1></span>
	<div class="float-right">
		<ul class="nav-items">
			<li class="nav-link">
				<button class="btn btn-primary"><h4><a href="{{ route('exercises.create', [$id_course, $id]) }}" style="color: white !important;">Create new exercise</a></h4></button>
			</li>
		</ul>
	</div>
	<br><br><br>
	<table class="table table-bordered table-hover table-striped">
		<tbody>
			@foreach($exercises as $exercise)
				<tr class="row">
					<td class="col-sm-4">
						Question: <strong>{{$exercise->question}}</strong>
					</td>
					<td class="col-sm-6">
						<strong>A.</strong> {{$exercise->choice1}}<br>
						<strong>B.</strong> {{$exercise->choice2}}<br>
						<strong>C.</strong> {{$exercise->choice3}}<br>
						<strong>D.</strong> {{$exercise->choice4}}<br>
						<strong>Answer:</strong> {{$exercise->answer}}
					</td>
					<td class="col-sm-2">
						<a href="{{ route('exercises.destroy', [$id_course, $id, $exercise])}}"><button class="btn btn-danger"> Delete </button></a>
						<a href="{{ route('exercises.edit', [$id_course, $id, $exercise])}}"><button class="btn btn-success">Update</button></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection