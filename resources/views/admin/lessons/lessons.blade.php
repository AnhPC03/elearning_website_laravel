@extends('admin.app')

@section('content')
<div class="container">
	<span><h1 style="color: blue;">{{ $numLessons }} Lessons</h1></span>
	<div class="float-right">
		<ul class="nav-items">
			<li class="nav-link">
				<button class="btn btn-primary"><h4><a href="{{ route('lessons.create', $id) }}" style="color: white !important;">Create new lesson</a></h4></button>
			</li>
		</ul>
	</div>
	<br><br><br>
	<table class="table table-bordered table-hover table-striped">
		<tbody>
			@foreach($lessons as $lesson)
				@if($lesson->id_course == $id)
					<tr class="row">
						<td class="col-sm-4">
							<a href="{{ route('comments.index', [$lesson->id_course, $lesson]) }}">
								<video width="300">
								  <source src="{{ asset('/lessons_videos/'.$lesson->id_course.'/'.$lesson->video) }}" type="video/mp4">
								</video>
							</a>
						</td>
						<td class="col-sm-6">
							<strong><a href="{{ route('comments.index', [$lesson->id_course, $lesson]) }}">{{$lesson->title}}</a></strong>
							<br/>
							<em>Description:</em>&nbsp;&nbsp;{{$lesson->description}}
						</td>
						<td class="col-sm-2">
							<a href="{{ route('lessons.destroy', [$lesson->id_course, $lesson->id]) }}"><button class="btn btn-danger"> Delete </button></a>
							<a href="{{ route('lessons.edit', [$lesson->id_course, $lesson->id]) }}"><button class="btn btn-success">Update</button></a>
							<a href="{{ route('exercises.index', [$lesson->id_course, $lesson->id]) }}"><button class="btn btn-success">Exercise</button></a>
						</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@endsection