<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::when(request('keyword'), function ($q) {
            $keyword = request('keyword');
            $q->where('name', "like", "%$keyword%");
        })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;

        //photo saving process
        $newName  = uniqid() . "_teacher_img" . $request->file('teacher_img')->extension();
        //save to public file
        $request->file('teacher_img')->storeAs("public",$newName);
        //save to db
        $teacher->photo = $newName;

        $teacher->save();

        $teacherName = $teacher->name;
        return redirect()->route('teacher.index')->with(['status' => $teacherName ." added successfully" ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //delete photo
        if(isset($teacher->photo)){
            Storage::delete('public/' . $teacher->photo);
        }
        //update process
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;

        //photo saving process
        $newName  = uniqid() . "_teacher_img" . $request->file('teacher_img')->extension();
        //save to public file
        $request->file('teacher_img')->storeAs("public",$newName);
        //save to db
        $teacher->photo = $newName;

        $teacher->update();

        $teacherName = $teacher->name;
        return redirect()->route('teacher.index')->with(['status' => $teacherName ." updated successfully" ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //delete photo
        if(isset($teacher->photo)){
            Storage::delete('public/' . $teacher->photo);
        }
        $teacherName = $teacher->name;
        $teacher->delete();
        return redirect()->route('teacher.index')->with(['status' => $teacherName ." deleted successfully" ]);

    }
}
