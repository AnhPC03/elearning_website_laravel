<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Course;
use App\Lesson;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $lessons = Lesson::all();
        $row = DB::table('lessons')
            ->select('*')
            ->where('id_course', '=', $id)
            ->get();
        $numLessons = count($row);
        return view('admin/lessons/lessons', compact('lessons', 'id', 'numLessons'));
    }

    public function indexUser($id)
    {
        $lessons = Lesson::all();
        $row = DB::table('lessons')
            ->select('*')
            ->where('id_course', '=', $id)
            ->get();
        $numLessons = count($row);
        return view('users/lessons', compact('lessons', 'id', 'numLessons'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin/lessons/create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // return $request->video->extension();
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'time' => 'required',
            'video' => 'required|mimes:mp4, avi|max:102400'
        ]);

        $lesson = new Lesson($request->input());
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $name_temp = substr($video, 5);
            $videoExtension = $video->getClientOriginalExtension();
            $destinationPath = public_path().'/lessons_videos/'.$id;
            $videoName = $name_temp.'.'.$videoExtension;
            $video->move($destinationPath, $videoName);
            $lesson->video = $videoName;
        }
        $lesson->id_course = $id;
        $lesson->save();
        return redirect('/admin/courses/'.$id.'/lessons')->with('success', 'Great! New lesson has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_course, Lesson $lesson)
    {
        return view('admin/lessons/showVideo', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_course, $id)
    {
        $lesson = Lesson::find($id);
        return view('admin.lessons.edit', compact('id_course', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, Lesson $lesson)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'time' => 'required',
            'video' => 'required|mimes:mp4, avi|max:102400'
        ]);
        $lesson->id_course = $id;
        $lesson->title = $request->title;
        $lesson->description = $request->description;
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = $video->getClientOriginalName();
            $destinationPath = public_path().'/lessons_videos/'.$id;
            $video->move($destinationPath, $videoName);
            $lesson->video = $videoName;
        }
        $lesson->save();
        return redirect('/admin/courses/'.$id.'/lessons')->with('success', 'Great! New lesson has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_course, $id)
    {
        DB::delete('delete from lessons where id = ?',[$id]);
        return back()->with('warning', 'You have deleted course successfully!');
    }
}
