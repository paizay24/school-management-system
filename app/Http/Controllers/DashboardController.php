<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Post;
use App\Models\Classroom;

class DashboardController extends Controller
{
    public function getCounts()
    {
        return response()->json([
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'posts' => Post::count(),
            'classrooms' => Classroom::count(),
        ]);
    }
}
