@extends('admin.app')

@section('content')
<div class="container shadow rounded" style="background-image: url('https://img.freepik.com/free-vector/bright-background-with-dots_1055-3132.jpg?size=338&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h1 style="color: violet;" class="text-center">Các khóa học đã học</h1>
                    <br>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-hover table-striped">
                        <tbody>
                            @foreach($statuses as $status)
                                <tr class="row">
                                    <td class="col-sm-4">
                                        <h5 style="color: blue;">{{$status->course->title}}</h5><br>
                                        (tổng có {{ count(\App\Lesson::select('*')->where('id_course', $status->id_course)->get()) }} bài)
                                    </td>
                                    <td class="col-sm-8">
                                        @foreach(explode(",", $status->lessons) as $i => $id_lesson)
                                            <p><h6 style="color: green;">* {{ \App\Lesson::where('id', $id_lesson)->get()[0]->title }}</h6></p>
                                        @endforeach
                                        <br>
                                        Đã học được {{count(explode(",", $status->lessons))}} / {{ count(\App\Lesson::select('*')->where('id_course', $status->id_course)->get()) }} bài
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
