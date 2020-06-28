<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Lesson;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Charts;

class UserController extends Controller
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
    public function index()
    {
        $users = User::all();
        return view('admin/users', compact('users'));
    }

    public function indexHomeAdmin()
    {
        $users = User::all();
        $numUsers = count($users);
        $courses = Course::all();
        $numCourses = count($courses);
        $lessons = Lesson::all();
        $numLessons = count($lessons);
        // $users = User::select(\DB::raw("COUNT(*) as count"))
        //             ->whereYear('created_at', date('Y'))
        //             ->groupBy(\DB::raw("Month(created_at)"))
        //             ->pluck('count');
        return view('admin.home', compact('users', 'numUsers', 'numCourses', 'numLessons'));
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
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        $user = Auth::user();
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Auth::user()->email == $request->email) {
            $this->validate($request, [
                'fullname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'You have updated your profile successfully!');
        } else {
            $this->validate($request, [
                'fullname' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'You have updated your profile successfully!');
        }
    }

    public function changeRole(User $user)
    {
        if ($user->type == 1) {
            DB::update('update users set type=? where id = ?',[0, $user->id]);
            return back()->with('success', 'You have updated successfully!');
        } else {
            DB::update('update users set type=? where id = ?',[1, $user->id]);
            return back()->with('success', 'You have updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from users where id = ?',[$id]);
        return back()->with('warning', 'You have deleted account successfully!');
    }
}
