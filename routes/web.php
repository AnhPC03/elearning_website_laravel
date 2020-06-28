<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('users/welcome');
});

Auth::routes();

Route::get('/home', 'Admin\StatusController@indexUser')->name('home');
Route::get('/admin/users/{id}', 'Admin\StatusController@index')->name('admin.users');

Route::get('/courses', function () {
	return view('users/courses');
});

Route::get('/askandanswer', function () {
	return view('users/askandanswer');
});

Route::get('/contact', function () {
	return view('users/contact');
});

Route::get('/sponsored', function () {
	return view('users/sponsored');
});

Route::get('/admin', 'Admin\UserController@indexHomeAdmin');
Route::get('admin/delete/{id}', 'Admin\UserController@destroy');

Route::get('admin/users', 'Admin\UserController@index');
Route::get('courses', 'Admin\CourseController@indexUser')->name('users.courses');
Route::get('courses/{id}/lessons', 'Admin\LessonController@indexUser')->name('users.lessons');
Route::get('courses/{id}/lessons/{lesson}/comments', 'Admin\CommentController@indexUser')->name('users.comments');
Route::post('courses/{id}/lessons/{lesson}/comments/{id_parent}', 'Admin\CommentController@store')->name('comments.store');
Route::get('courses/{id}/lessons/{lessons}/exercises', 'Admin\ExerciseController@indexUser')->name('users.exercises');
Route::get('courses/{id}/lessons/{lessons}/exercises/{exercise}/{answer}', 'Admin\ExerciseController@checkAnswer')->name('users.exercisesCheck');
// Route::get('courses/{id}/lessons/{lesson}/exercises', 'Admin\ExerciseController@index')->name('exercises.index');
// Route::post('admin/courses/{id}/lessons/{lesson}/comments/{id_parent}', 'Admin\CommentController@store')->name('comments.store');
// Route::resource('/admin/users', 'Admin\UserController');
Route::resource('/admin/courses/{id}/lessons/{lesson}/exercises', 'Admin\ExerciseController');
Route::resource('/admin/courses', 'Admin\CourseController');
Route::resource('/admin/courses/{id}/lessons', 'Admin\LessonController');
Route::resource('/admin/courses/{id}/lessons/{lesson}/comments', 'Admin\CommentController');
Route::get('{user}', 'Admin\UserController@edit')->name('users.edit');
Route::post('{user}/update', 'Admin\UserController@update')->name('users.update');
Route::post('admin/courses/{course}', 'Admin\CourseController@update')->name('courses.update');
Route::post('admin/courses/{id}/lessons/{lesson}', 'Admin\LessonController@update')->name('lessons.update');
Route::post('admin/courses/{id}/lessons/{lesson}/exercises/{exercise}', 'Admin\ExerciseController@update')->name('exercises.update');
Route::get('admin/courses/delete/{id}', 'Admin\CourseController@destroy');
Route::get('admin/courses/{id}/lessons/{lesson}', 'Admin\LessonController@destroy')->name('lessons.destroy');
Route::get('admin/courses/{id}/lessons/{lesson}/exercises/{exercise}', 'Admin\ExerciseController@destroy')->name('exercises.destroy');
// Route::get('admin/courses/{id}/lessons/{lesson}/comments', 'Admin\CommentController@show')->name('lessons.showVideo');
// Route::get('admin/courses/{id}/lessons/{lesson}/comments/{id_comment}', 'Admin\CommentController@destroy')->name('comments.destroy');
Route::post('admin/courses/{id}/lessons/{lesson}/comments/{id_parent}', 'Admin\CommentController@store')->name('comments.store');
Route::post('courses/{id}/lessons/{lesson}', 'Admin\StatusController@store')->name('statuses.store');
Route::get('admin/users/{user}', 'Admin\UserController@changeRole')->name('users.changeRole');

