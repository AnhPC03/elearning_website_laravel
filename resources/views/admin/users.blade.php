@extends('admin.app')

@section('content')
<div class="container" style="padding-bottom: 250px;">
	@if(Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">x</button>
			<strong> {{ Session::get('success') }}</strong>
		</div>
	@endif
	<br><br><br>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr><strong><h3>User(s)</h3></strong></tr>
			<tr class="row">
				<th class="col-sm-3">Full name</th>
				<th class="col-sm-2">Username</th>
				<th class="col-sm-3">Email</th>
				<th class="col-sm-4">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
				@if($user->type == 1)
					<tr class="row">
						<td class="col-sm-3">{{ $user->fullname }}</td>
						<td class="col-sm-2">{{ $user->username }}</td>
						<td class="col-sm-3">{{ $user->email }}</td>
						<td class="col-sm-4">
							<a href="delete/{{ $user->id }}"><button class="btn btn-danger"> Delete </button></a>
							<a href="{{route('admin.users', $user->id)}}"><button class="btn btn-success"> Show </button></a>
						</td>
					</tr>
				@endif
			@endforeach
		</tbody>
	</table>
</div>
@endsection