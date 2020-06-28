@extends('layouts.app')

@section('content')
<div class="container shadow rounded" style="background-image: url('https://img.freepik.com/free-vector/watercolor-background_87374-69.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<br>
			<h1 style="color: violet;" class="text-center">Gồm {{$numLessons}} bài học</h1>
			<br>
		</thead>
		<tbody>
			@foreach($lessons as $lesson)
				@if($lesson->id_course == $id)
					<tr class="row">
						<td class="col-sm-4">
							<a href="{{ route('users.comments', [$lesson->id_course, $lesson]) }}" data-id="{{$lesson->id}}" data-idCourse="{{$lesson->id_course}}" class="lesson">
								<video width="300">
								  <source src="{{ asset('/lessons_videos/'.$lesson->id_course.'/'.$lesson->video) }}" type="video/mp4">
								</video>
							</a>
						</td>
						<td class="col-sm-6">
							<strong><a href="{{ route('users.comments', [$lesson->id_course, $lesson]) }}" data-id="{{$lesson->id}}" data-idCourse="{{$lesson->id_course}}" class="lesson">{{$lesson->title}}</a></strong>
							<br/>
							<em>Description:</em>&nbsp;&nbsp;{{$lesson->description}}<br>
							<em>Time:</em>&nbsp;&nbsp;{{$lesson->time}} minutes
						</td>
						<td>
							<a href="{{ route('users.exercises', [$lesson->id_course, $lesson->id]) }}"><button style="padding: 10px 20px;" class="btn btn-success">Exercise</button></a>
						</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$.ajaxSetup({
		  	headers: {
		     	 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	}
		});

		$('.lesson').click(function() {
			let id_lesson = $(this).attr('data-id');
			let id_course = $(this).attr('data-idCourse');
			$.ajax({
				data: {
					id_lesson: id_lesson,
				},
				url: '/courses/'+id_course+'/lessons/'+id_lesson,
				type: "POST",
				success: function(data) {
					console.log("OK");
					console.log(data);
				}
			});
		});
	});
</script>