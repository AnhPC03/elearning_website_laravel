<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Lesson;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
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
    public function index($id_course, Lesson $lesson)
    {
        $row = DB::table('comments')
            ->select('*')
            ->where('lesson_id', '=', $lesson->id)
            ->get();
        $numComments = count($row);
        return view('admin.lessons.showVideo', compact('lesson', 'numComments'));
    }

    public function indexUser($id_course, Lesson $lesson)
    {
        $row = DB::table('comments')
            ->select('*')
            ->where('lesson_id', '=', $lesson->id)
            ->get();
        $numComments = count($row);
        return view('users/comments', compact('lesson', 'numComments'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id_course, $lesson_id, $id_parent)
    {
        $input['content'] = $request->content;
        $input['lesson_id'] = $lesson_id;
        $input['id_user'] = auth()->user()->id;
        $input['id_parent'] = $id_parent;

        $comment = Comment::create($input);
        $id = $comment->id;
        $username = auth()->user()->username;
        $isAdmin = auth()->user()->type;

        return response()->json(['id' => $id, 'username' => $username, 'content' => $request->content, 'isAdmin' => $isAdmin]);
        // $validator = Validator::make($request->all(), [
        //     'content' => 'required',
        // ]);

        // if ($validator->pass()) {
        //     $input['content'] = $request->content;
        //     $input['lesson_id'] = $lesson_id;
        //     $input['id_user'] = auth()->user()->id;
        //     $input['id_parent'] = $id_parent;

        //     $comment = Comment::create($input);

        //     return response()->json(['code'=>200, 'message'=>'Add comment successfully','data' => $comment], 200);
        // } 
        // return response()->json(['error'=>$validator->errors()->all()]);
        
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_course, Lesson $lesson)
    {
        $row = DB::table('comments')
            ->select('*')
            ->where('lesson_id', '=', $lesson->id)
            ->get();
        $numComments = count($row);
        return response()->json(['lesson'=>$lesson, 'numComments'=>$numComments]);
        // return view('admin/lessons/showVideo', compact('lesson', 'numComments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_course, $id_lesson, $id)
    {
        DB::delete('delete from comments where id = ?',[$id]);
        DB::delete('delete from comments where id_parent = ?', [$id]);
        return response()->json(['success'=>'Comment deleted successfully']);
        // return back()->with('warning', 'You have deleted comment successfully!');
    }
}
