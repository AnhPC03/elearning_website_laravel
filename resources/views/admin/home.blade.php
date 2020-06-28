@extends('admin.app')

@section('content')
<div class="container">
    <div class="container shadow rounded card" style="background-image: url('https://img.freepik.com/free-vector/halftone-white-background_115579-724.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
    <div class="px-100 card-header" style="background-image: url('https://img.freepik.com/free-vector/summer-themed-banner-design_1048-12364.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
        <br>
        <h1 class="font-w700 mb-10 pt-50 text-center">Tổng quan</h1>
        <br>
    </div>
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item">
            <br>
            <h3 class="block-title font-w600"><i class="fa fa-info-circle fa-fw"></i> Số lượng học viên</h3>
            <p>
                <h4 style="color: blue;">{{$numUsers - 1}} học viên.</h4>
            </p>
            <br>
        </li>
        <li class="list-group-item">
            <br>
            <h3 class="block-title font-w600"><i class="fa fa-info-circle fa-fw"></i> Số lượng khóa học</h3>
            <p>
                <h4 style="color: blue;">{{$numCourses}} khóa học.</h4>
            </p>
            <br>
        </li>
        <li class="list-group-item">
            <br>
            <h3 class="block-title font-w600"><i class="fa fa-info-circle fa-fw"></i> Số lượng bài học</h3>
            <p>
                <h4 style="color: blue;">{{$numLessons}} bài học.</h4>
            </p>
            <br>
        </li>
    </ul>
 </div>
@endsection