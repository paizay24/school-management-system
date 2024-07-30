<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Post;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $posts = Post::all();
        $classRooms = Classroom::all();

        return view('home',compact('students','teachers','posts','classRooms'));
    }
}
