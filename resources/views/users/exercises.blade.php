@extends('layouts.app')

@section('content')
<div id="result"></div>
<div class="container shadow rounded" style="background-image: url('https://img.freepik.com/free-vector/watercolor-background_87374-69.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<br>
			<h1 style="color: violet;" class="text-center">Gồm {{$numExercises}} bài tập</h1>
			<br>
		</thead>
		<tbody>
			@foreach($exercises as $exercise)
				<tr class="row">
					<td class="col-sm-4">
						Question: <strong>{{$exercise->question}}</strong>
					</td>
					<td class="col-sm-6">
						<input type="radio" name="choice" value="A" id="A">
						<label for="A"><strong>A.</strong> {{$exercise->choice1}}</label><br>
						<input type="radio" name="choice" value="B" id="B">
						<label for="B"><strong>B.</strong> {{$exercise->choice2}}</label><br>
						<input type="radio" name="choice" value="C" id="C">
						<label for="C"><strong>C.</strong> {{$exercise->choice3}}</label><br>
						<input type="radio" name="choice" value="D" id="D">
						<label for="D"><strong>D.</strong> {{$exercise->choice4}}</label><br>
					</td>
					<td class="col-sm-2">
						<a href="javascript:void(0)" style="padding: 10px 20px;" class="btn-success btn checkAnswer" data-idLesson="{{ $id }}" data-idCourse="{{ $id_course }}" data-id="{{$exercise->id}}">Check</a>
					</td>
				</tr>
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

		$('.container').on('click', '.checkAnswer', function() {
			let id_course = $(this).attr('data-idCourse');
			let id_lesson = $(this).attr('data-idLesson');
			let id = $(this).attr('data-id');
			let answer = $('input[name="choice"]:checked').val();
			console.log(id_course);
			console.log(id_lesson);
			console.log(id);
			console.log(answer);
			$.ajax({
				data: {
					id_course: id_course,
					id_lesson: id_lesson,
					id: id,
					answer: answer,
				},
				url: '/courses/'+id_course+'/lessons/'+id_lesson+'/exercises/'+id+'/'+answer,
				type: "GET",
				success: function(data) {
					if(data.check == 1) {
						$('#result').html('<div class="container shadow rounded card" style="background-color: green;"><h4 style="color: white;">You are Correct</h4></div>');
					} else {
						$('#result').html('<div class="container shadow rounded card" style="background-color: red;"><h4 style="color: white;">You are False. The result is '+data.result+'</h4></div>');

					}
				}
			});
		});
	});
</script>
