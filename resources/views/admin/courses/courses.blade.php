@extends('admin.app')

@section('content')
<div class="container">
	@if(Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong> {{ Session::get('success') }}</strong>
		</div>
	@endif
	<span><h1 style="color: blue;">{{ $numCourses }} Courses</h1></span>
	<div class="float-right">
		<ul class="nav-items">
			<li class="nav-link">
				<button class="btn btn-primary"><h4><a href="{{ route('courses.create') }}" style="color: white !important;">Create new course</a></h4></button>
			</li>
		</ul>
	</div>
	<br><br><br>
	<table class="table table-bordered table-hover table-striped">
		<tbody>
			@foreach($courses->reverse() as $course)
				<tr>
					<td><a href="{{ route('lessons.index', $course->id) }}"><img src="{{ asset('/courses_images/'.$course->image) }}" style="height: 150px; width: 300px;"></a></td>
					<td>
						<strong><a href="{{ route('lessons.index', $course->id) }}">{{$course->title}}</a></strong>
						<br/>
						<em>Description:</em>&nbsp;&nbsp;{{$course->description}}
					</td>
					<td>
						<a href="courses/delete/{{ $course->id }}"><button class="btn btn-danger"> Delete </button></a>
						<a href="{{ route('courses.edit', $course->id) }}"><button class="btn btn-success">Update</button></a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection