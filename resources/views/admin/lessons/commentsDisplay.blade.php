<div class="comment-container">
    @foreach($comments as $comment)
        @if($comment->id_parent != 0)
            <div class="display-comment" style="margin-left:40px;">
                @if($comment->user->type == 0)
                    <em><strong>{{ $comment->user->username }}</strong></em>
                    <span class="badge badge-warning">Admin</span>
                @else
                    <em><strong>{{ $comment->user->username }}</strong></em>
                @endif
                <p style="font-size: 18px;">{{ $comment->content }}</p>
                <form method="post" action="{{ route('comments.store', [$lesson->id_course, $lesson, $comment->id_parent]) }}">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" name="content" class="form-control" />
                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}" />
                        <input type="hidden" name="id_parent" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group" style="display: inline-block;">
                        <input type="submit" class="btn btn-success" value="Reply" />
                    </div>
                    <div class="form-group" style="display: inline-block;">
                        <button class="deleteComment" data-idCourse="{{ $lesson->id_course }}" data-idLesson="{{ $lesson->id }}" data-id="$comment->id" style="width: 77.5px;">Delete</button>
                    </div>
                </form>
                @include('admin.lessons.commentsDisplay', ['comments' => $comment->replies, 'lesson' => $lesson])
            </div>
        @else
            <div class="display-comment">
                @if($comment->user->type == 0)
                    <em><strong>{{ $comment->user->username }}</strong></em>
                    <span class="badge badge-warning">Admin</span>
                @else
                    <em><strong>{{ $comment->user->username }}</strong></em>
                @endif
                <p style="font-size: 18px;">{{ $comment->content }}</p>
                <form method="post" action="{{ route('comments.store', [$lesson->id_course, $lesson, $comment->id]) }}">
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="text" name="content" class="form-control" />
                        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}" />
                        <input type="hidden" name="id_parent" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group" style="display: inline-block;">
                        <input type="submit" class="btn btn-success" value="Reply" />
                    </div>
                    <div class="form-group" style="display: inline-block;">
                        <a href="{{ route('comments.destroy', [$lesson->id_course, $lesson->id, $comment->id]) }}"><input style="width: 77.5px;" class="btn btn-danger" value="Delete"/></a>
                    </div>
                </form>
                @include('admin.lessons.commentsDisplay', ['comments' => $comment->replies, 'lesson' => $lesson])
            </div>
        @endif
    @endforeach
</div>