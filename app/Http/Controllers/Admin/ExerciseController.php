<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exercise;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
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
    public function index($id_course, $id)
    {
        $exercises = Exercise::where('id_lesson', $id)->get();
        $numExercises = count($exercises);
        return view('admin/exercises/exercises', compact('exercises', 'id_course', 'id', 'numExercises'));
    }

    public function indexUser($id_course, $id)
    {
        $exercises = Exercise::where('id_lesson', $id)->get();
        $numExercises = count($exercises);
        return view('users/exercises', compact('exercises', 'id_course', 'id', 'numExercises'));
    }

    public function checkAnswer($id_course, $id_lesson, $id, $answer)
    {
        $exercise = Exercise::where('id', $id)->first();
        if($exercise->answer == $answer) {
            return response()->json(['check'=>1]);
        } else {
            return response()->json(['check'=>0, 'result'=>$exercise->answer ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_course, $id)
    {
        return view('admin/exercises/create', compact('id_course', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_course, $id)
    {
        $this->validate($request, [
            'question' => 'required|unique:exercises',
            'choice1' => 'required',
            'choice2' => 'required',
            'choice3' => 'required',
            'choice4' => 'required',
            'answer' => 'required',
        ]);
        $exercise = new Exercise($request->input());
        $exercise->id_lesson = $id;
        $exercise->save();
        return redirect('/admin/courses/'.$id_course.'/lessons/'.$id.'/exercises')->with('success', 'Great! New lesson has been successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_course, $id_lesson, Exercise $exercise)
    {
        return view('admin.exercises.edit', compact('id_course', 'id_lesson', 'exercise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_course, $id_lesson, Exercise $exercise)
    {
        if($exercise->question == $request->question) {
            $this->validate($request, [
                // 'question' => 'required|unique:exercises',
                'choice1' => 'required',
                'choice2' => 'required',
                'choice3' => 'required',
                'choice4' => 'required',
                'answer' => 'required',
            ]);
            $exercise->choice1 = $request->choice1;
            $exercise->choice2 = $request->choice2;
            $exercise->choice3 = $request->choice3;
            $exercise->choice4 = $request->choice4;
            $exercise->id_lesson = $id_lesson;
            $exercise->answer = $request->answer;
            $exercise->save();
            return redirect('admin/courses/'.$id_course.'/lessons/'.$id_lesson.'/exercises')->with('success', 'You have updated successfully!');
        } else {
            $this->validate($request, [
                'question' => 'required|unique:exercises',
                'choice1' => 'required',
                'choice2' => 'required',
                'choice3' => 'required',
                'choice4' => 'required',
                'answer' => 'required',
            ]);
            $exercise->question = $request->question;
            $exercise->choice1 = $request->choice1;
            $exercise->choice2 = $request->choice2;
            $exercise->choice3 = $request->choice3;
            $exercise->choice4 = $request->choice4;
            $exercise->id_lesson = $id_lesson;
            $exercise->answer = $request->answer;
            $exercise->save();
            return redirect('admin/courses/'.$id_course.'/lessons/'.$id_lesson.'/exercises')->with('success', 'You have updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_course, $id_lesson, Exercise $exercise)
    {
        DB::delete('delete from exercises where id = ?',[$exercise->id]);
        return back()->with('warning', 'You have deleted course successfully!');
    }
}
