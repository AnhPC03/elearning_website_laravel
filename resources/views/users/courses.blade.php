@extends('layouts.app')

@section('content')
<div class="container shadow rounded" style="background-image: url('https://img.freepik.com/free-vector/watercolor-background_87374-69.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<br>
			<h1 style="color: violet;" class="text-center">Các khóa học hiện tại</h1>
			<br>
		</thead>
		<tbody>
			@foreach($courses->reverse() as $course)
				<tr class="row">
					<td class="col-sm-4"><a href="{{ route('users.lessons', $course->id) }}"><img src="{{ asset('/courses_images/'.$course->image) }}" style="height: 150px; width: 300px;"></a></td>
					<td class="col-sm-8">
						<strong><a href="{{ route('users.lessons', $course->id) }}">{{$course->title}}</a></strong>
						<br/>
						<em>Description:</em>&nbsp;&nbsp;{{$course->description}}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
