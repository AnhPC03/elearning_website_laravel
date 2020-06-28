<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Status;
class StatusController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($id_user)
    {
        $statuses = Status::where('id_user', $id_user)
                    ->get();
        return view('admin/showUser', compact('statuses'));
    }

    public function indexUser()
    {
        $id_user = auth()->user()->id;
        $statuses = Status::where('id_user', $id_user)
                    ->get();
        return view('users/home', compact('statuses'));
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
    public function store(Request $request, $id_course)
    {
        $id_user = auth()->user()->id;
        $row1 = DB::table('statuses')
            ->select('*')
            ->where('id_user', '=', $id_user)
            ->where('id_course', '=', $id_course)
            ->get();
        $checkUser = count($row1);
        if($checkUser == 0) {
            $status = new Status;
            $status->id_user = $id_user;
            $status->id_course = $id_course;
            $status->lessons = "".$request->id_lesson;
            $status->save();
        } else {
            $status = Status::where('id_user', $id_user)
                    ->where('id_course', $id_course)
                    ->first();

            $lessons = explode(",", $status->lessons);
            if(in_array($request->id_lesson, $lessons)) {
                return 'YES';
            }
            $status->lessons = $status->lessons.", ".$request->id_lesson;
            $status->save();
        }
        return response()->json(['success'=>'Comment deleted successfully']);
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
    public function destroy($id)
    {
        //
    }
}
