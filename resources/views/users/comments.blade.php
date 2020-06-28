@extends('layouts.app')

@section('content')
<div class="container shadow rounded" style="background-image: url('https://img.freepik.com/free-vector/halftone-white-background_115579-724.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
	<div>
		<br><br><br>
		<video width="1100" height="600" controls autoplay>
		  	<source src="{{ asset('/lessons_videos/'.$lesson->id_course.'/'.$lesson->video) }}" type="video/mp4">
		</video>
		<br/><br/>
		<h3><strong><a href="#">{{$lesson->title}}</a></strong></h3>
		<em>Description:</em>&nbsp;&nbsp;{{$lesson->description}}
		<br><br><br>
		<hr />
		<div class="row">
		    <div class="col-md-12">
		        <h2><b id="numComments">{{$numComments}} Comments</b></h2>
		        <div class="userComments">

		        </div>
		    </div>
		</div>
		<hr />
		<div class="row">
		    <div class="col-md-12">
		        <textarea class="form-control" id="mainComment" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
		        <a href="javascript:void(0)" style="float:right; padding: 10px 20px;" class="btn-primary btn addComment" data-idLesson="{{ $lesson }}" data-idCourse="{{ $lesson->id_course }}" id="addComment">Add Comment</a>
		    </div>
		</div>
		<br>
	</div>

	<div class="comment-container">
		@foreach($lesson->comments->reverse() as $comment)
		    @if($comment->id_parent == 0)
    	        <div class="display-comment" id="{{ $comment->id }}">
    	            @if($comment->user->type == 0)
    	                <em><strong>{{ $comment->user->username }}</strong></em>
    	                <span class="badge badge-warning">Admin</span>&nbsp;&nbsp;
    	            @else
    	                <em><strong>{{ $comment->user->username }}</strong></em>&nbsp;&nbsp;
    	            @endif
    	            <span style="font-size: 18px;">{{ $comment->content }}</span><br>
    	            <a style="color: blue; cursor: pointer;" class="reply" id="reply{{$comment->id}}" onclick="$('#replyRow{{$comment->id}}').show();">Reply</a>&nbsp;&nbsp;
    	            @if($comment->user->id == auth()->user()->id || auth()->user()->type == 0)
    	            	<a style="color: blue; cursor: pointer;" class="deleteComment" id="deleteComment{{$comment->id}}" data-idLesson="{{ $lesson->id }}" data-idCourse="{{ $lesson->id_course }}">Delete</a>
    	            @endif
    	           	<div class="row replyRow" style="display:none" id="replyRow{{$comment->id}}">
    		            <div class="col-md-12">
    		                <textarea class="form-control" id="replyComment{{$comment->id}}" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
    		                <a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyComment" id="addReplyComment{{$comment->id}}" data-idLesson="{{ $lesson->id }}" data-idCourse="{{ $lesson->id_course }}">Add Reply</a>
    		                <a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close{{$comment->id}}" onclick="$('#replyRow{{$comment->id}}').hide();">Close</a>
    		            </div>
    	            </div>
    	            <br><br>

	    	        @foreach($lesson->comments as $reply)
	    	            @if($reply->id_parent == $comment->id)
					        <div class="display-reply" id="{{$reply->id}}" id_parent="{{ $reply->id_parent }}" style="margin-left:40px;">
					            @if($reply->user->type == 0)
					                <em><strong>{{ $reply->user->username }}</strong></em>
					                <span class="badge badge-warning">Admin</span> &nbsp;&nbsp;
					            @else
					                <em><strong>{{ $reply->user->username }}</strong></em>&nbsp;&nbsp;
					            @endif
					            <span style="font-size: 18px;">{{ $reply->content }}</span><br>
			    		            <a style="color: blue; cursor: pointer;" class="reply" id="reply{{$reply->id}}" onclick="$('#replyRow{{$reply->id}}').show();">Reply</a>&nbsp;&nbsp;
			    		            @if($reply->user->id == auth()->user()->id || auth()->user()->type == 0)
			    		            	<a style="color: blue; cursor: pointer;" class="deleteReply" id="deleteReply{{$reply->id}}" data-idLesson="{{ $lesson->id }}" data-idCourse="{{ $lesson->id_course }}">Delete</a>
			    		            @endif
			    		           	<div class="row replyRow" style="display:none" id="replyRow{{$reply->id}}">
			    			            <div class="col-md-12">
			    			                <textarea class="form-control" id="replyReply{{$reply->id}}" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br>
			    			                <a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyReply" id="addReplyReply{{$reply->id}}" data-parent="{{$reply->id_parent}}" data-idLesson="{{ $lesson->id }}" data-idCourse="{{ $lesson->id_course }}">Add Reply</a>
			    			                <a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close{{$reply->id}}" onclick="$('#replyRow{{$reply->id}}').hide();">Close</a>
			    			            </div>
			    		            </div>
					            <br><br>
					        </div>
					    @endif
					@endforeach
				</div>
			@endif
		@endforeach
	</div>
</div>
@endsection
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
<script type="text/javascript">
	var max = <?php echo $numComments ?>;
	$(document).ready(function() {
		$.ajaxSetup({
		  	headers: {
		     	 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  	}
		});

		$('body').on('click', '.addComment', function() {
			var lesson = JSON.parse($(this).attr('data-idLesson'));
			let id_course = lesson.id_course;
			let id_parent = 0;
			let content = $('#mainComment').val();
			$.ajax({
				data: {
					content: content
				},
				url: '/admin/courses/'+id_course+'/lessons/'+lesson.id+'/comments/'+id_parent,
				type: "POST",
				success: function(data) {
					// console.log(data);
					max++;
                    $("#numComments").text(max + " Comments");
                    $('#mainComment').val("");
                    if(data.isAdmin == 0) {
                    	$('.comment-container').prepend('<div class="display-comment" id="'+data.id+'"><em><strong>'+data.username+'</strong></em>&nbsp;&nbsp;<span class="badge badge-warning">Admin</span>&nbsp;&nbsp;<span style="font-size: 18px;">'+data.content+'</span><br><a style="color: blue; cursor: pointer;" class="reply" id="reply'+data.id+'">Reply</a>&nbsp;&nbsp;<a style="color: blue; cursor: pointer;" class="deleteComment" id="deleteComment'+data.id+'" data-idLesson="'+lesson.id+'" data-idCourse="'+id_course+'">Delete</a><div class="row replyRow" style="display:none" id="replyRow'+data.id+'"><div class="col-md-12"><textarea class="form-control" id="replyComment'+data.id+'" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyComment" id="addReplyComment'+data.id+'" data-idLesson="'+lesson.id+'" data-idCourse="'+id_course+'">Add Reply</a><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close'+data.id+'">Close</a></div></div><br><br></div>');
                    } else {
                    	$('.comment-container').prepend('<div class="display-comment" id="'+data.id+'"><em><strong>'+data.username+'</strong></em>&nbsp;&nbsp;<span style="font-size: 18px;">'+data.content+'</span><br><a style="color: blue; cursor: pointer;" class="reply" id="reply'+data.id+'">Reply</a>&nbsp;&nbsp;<a style="color: blue; cursor: pointer;" class="deleteComment" id="deleteComment'+data.id+'" data-idLesson="'+lesson.id+'" data-idCourse="'+id_course+'">Delete</a><div class="row replyRow" style="display:none" id="replyRow'+data.id+'"><div class="col-md-12"><textarea class="form-control" id="replyComment'+data.id+'" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyComment" id="addReplyComment'+data.id+'" data-idLesson="'+lesson.id+'" data-idCourse="'+id_course+'">Add Reply</a><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close'+data.id+'">Close</a></div></div><br><br></div>');
                    }

                    $('.comment-container').on('click', '#reply'+data.id, function(){
                    	$('#replyRow'+data.id).show();
                    });

                    $('.comment-container').on('click', '#close'+data.id, function(){
                    	$('#replyRow'+data.id).hide();
                    });
				}
			});
			// return false;
		});

		$('.comment-container').on('click', '.replyComment', function() {
			let id_parent = $(this).attr('id');
			id_parent = parseInt(id_parent.substr(15, id_parent.length));
			let lesson_id = $(this).attr('data-idLesson');
			let id_course = $(this).attr('data-idCourse');
			let content = $('#replyComment'+id_parent).val();
			$.ajax({
				data: {
					content: content,
				},
				url: '/admin/courses/'+id_course+'/lessons/'+lesson_id+'/comments/'+id_parent,
				type: "POST",
				success: function(data) {
					max++;
                    $("#numComments").text(max + " Comments");
                    $('#replyComment'+id_parent).val("");
                    $('#replyRow'+id_parent).hide();
                    if (data.isAdmin == 0) {
                    	$('#'+id_parent+'.display-comment').append('<div class="display-reply" id="'+data.id+'" id_parent="'+id_parent+'" style="margin-left:40px;"><em><strong>'+data.username+'</strong></em>&nbsp;&nbsp;<span class="badge badge-warning">Admin</span> &nbsp;&nbsp;<span style="font-size: 18px;">'+data.content+'</span><br><a style="color: blue; cursor: pointer;" class="reply" id="reply'+data.id+'">Reply</a>&nbsp;&nbsp;<a style="color: blue; cursor: pointer;" class="deleteReply" id="deleteReply'+data.id+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Delete</a><div class="row replyRow" style="display:none" id="replyRow'+data.id+'"><div class="col-md-12"><textarea class="form-control" id="replyReply'+data.id+'" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyReply" id="addReplyReply'+data.id+'" data-parent="'+id_parent+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Add Reply</a><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close'+data.id+'">Close</a></div></div><br><br></div>');
                    } else {
                    	$('#'+id_parent+'.display-comment').append('<div class="display-reply" id="'+data.id+'" id_parent="'+id_parent+'" style="margin-left:40px;"><em><strong>'+data.username+'</strong></em>&nbsp;&nbsp;<span style="font-size: 18px;">'+data.content+'</span><br><a style="color: blue; cursor: pointer;" class="reply" id="reply'+data.id+'">Reply</a>&nbsp;&nbsp;<a style="color: blue; cursor: pointer;" class="deleteReply" id="deleteReply'+data.id+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Delete</a><div class="row replyRow" style="display:none" id="replyRow'+data.id+'"><div class="col-md-12"><textarea class="form-control" id="replyReply'+data.id+'" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyReply" id="addReplyReply'+data.id+'" data-parent="'+id_parent+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Add Reply</a><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close'+data.id+'">Close</a></div></div><br><br></div>');
                    }

                    $('.comment-container').on('click', '#reply'+data.id, function(){
                    	$('#replyRow'+data.id).show();
                    });

                    $('.comment-container').on('click', '#close'+data.id, function(){
                    	$('#replyRow'+data.id).hide();
                    });
				}
			});
		});

		$('.comment-container').on('click', '.replyReply', function() {
			let id_parent = $(this).attr('data-parent');
			let lesson_id = $(this).attr('data-idLesson');
			let id_course = $(this).attr('data-idCourse');
			let id = $(this).attr('id');
			id = parseInt(id.substr(13, id.length));
			let content = $('#replyReply'+id).val();
			$.ajax({
				data: {
					content: content,
				},
				url: '/admin/courses/'+id_course+'/lessons/'+lesson_id+'/comments/'+id_parent,
				type: "POST",
				success: function(data) {
					max++;
					$("#numComments").text(max + " Comments");
					$('#replyReply'+id).val("");
					$('#replyRow'+id).hide();
					if(data.isAdmin == 0) {
						$('#'+id_parent+'.display-comment').append('<div class="display-reply" id="'+data.id+'" id_parent="'+id_parent+'" style="margin-left:40px;"><em><strong>'+data.username+'</strong></em>&nbsp;&nbsp;<span class="badge badge-warning">Admin</span> &nbsp;&nbsp;<span style="font-size: 18px;">'+data.content+'</span><br><a style="color: blue; cursor: pointer;" class="reply" id="reply'+data.id+'">Reply</a>&nbsp;&nbsp;<a style="color: blue; cursor: pointer;" class="deleteReply" id="deleteReply'+data.id+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Delete</a><div class="row replyRow" style="display:none" id="replyRow'+data.id+'"><div class="col-md-12"><textarea class="form-control" id="replyReply'+data.id+'" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyReply" id="addReplyReply'+data.id+'" data-parent="'+id_parent+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Add Reply</a><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close'+data.id+'">Close</a></div></div><br><br></div>');
					} else {
						$('#'+id_parent+'.display-comment').append('<div class="display-reply" id="'+data.id+'" id_parent="'+id_parent+'" style="margin-left:40px;"><em><strong>'+data.username+'</strong></em>&nbsp;&nbsp;<span style="font-size: 18px;">'+data.content+'</span><br><a style="color: blue; cursor: pointer;" class="reply" id="reply'+data.id+'">Reply</a>&nbsp;&nbsp;<a style="color: blue; cursor: pointer;" class="deleteReply" id="deleteReply'+data.id+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Delete</a><div class="row replyRow" style="display:none" id="replyRow'+data.id+'"><div class="col-md-12"><textarea class="form-control" id="replyReply'+data.id+'" placeholder="Add Public Comment" cols="30" rows="2"></textarea><br><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-primary btn replyReply" id="addReplyReply'+data.id+'" data-parent="'+id_parent+'" data-idLesson="'+lesson_id+'" data-idCourse="'+id_course+'">Add Reply</a><a href="javascript:void(0)" style="float:right; padding: 10px 20px; cursor: pointer;" class="btn-default btn" id="close'+data.id+'">Close</a></div></div><br><br></div>');
					}

					$('.comment-container').on('click', '#reply'+data.id, function(){
						$('#replyRow'+data.id).show();
					});

					$('.comment-container').on('click', '#close'+data.id, function(){
						$('#replyRow'+data.id).hide();
					});
				}
			});
		});

		$('.comment-container').on('click', '.deleteComment', function() {
			let lesson_id = $(this).attr('data-idLesson');
			let id_course = $(this).attr('data-idCourse');
			let id = $(this).attr('id');
			id = parseInt(id.substr(13, id.length));
			$.ajax({
				url: '/admin/courses/'+id_course+'/lessons/'+lesson_id+'/comments/'+id,
				type: "DELETE",
				success: function(data) {
					max -= $('#'+id+'.display-comment > div').length;
					$("#numComments").text(max + " Comments");
					$('#'+id+'.display-comment').remove();
				}
			});
		});

		$('.comment-container').on('click', '.deleteReply', function() {
			let lesson_id = $(this).attr('data-idLesson');
			let id_course = $(this).attr('data-idCourse');
			let id = $(this).attr('id');
			id = parseInt(id.substr(11, id.length));
			// console.log(lesson_id);
			// console.log(id_course);
			// console.log(id);
			$.ajax({
				url: '/admin/courses/'+id_course+'/lessons/'+lesson_id+'/comments/'+id,
				type: "DELETE",
				success: function(data) {
					--max;
					$("#numComments").text(max + " Comments");
					$('#'+id+'.display-reply').remove();
				}
			});
		});
	});
</script>