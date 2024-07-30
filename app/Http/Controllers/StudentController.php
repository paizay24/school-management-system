<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = student::when(request('keyword'),function($query){
            $keyword = request('keyword');
            $query->where(function($q) use ($keyword){
                $q->orWhere('students.name','like',"%$keyword%")
                ->orWhere('gender','like',"%$keyword%")
                ->orWhere('roll_no','like',"%$keyword%")
                ->orWhereHas('classroom', function($q) use($keyword){
                    $q->where('classrooms.name', 'like', "%{$keyword}%");

                });
            });
        })
            ->latest('id')
            ->with(['classroom'])
            ->paginate(10)->withQueryString();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentRequest $request)
    {
        $student = new student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->roll_no = $request->roll_no;
        $student->classroom_id = $request->classroom_id;

        //photo saving process
        $newName  = uniqid() . "_student_img" . $request->file('student_img')->extension();
        //save to public file
        $request->file('student_img')->storeAs("public", $newName);
        //save to db
        $student->photo = $newName;

        $student->save();

        $studentName = $student->name;
        return redirect()->route('student.index')->with(['status' => $studentName . " added successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentRequest $request, student $student)
    {
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->gender = $request->gender;
        $student->roll_no = $request->roll_no;
        $student->classroom_id = $request->classroom_id;

        //delete photo
        if (isset($student->photo)) {
            Storage::delete('public/' . $student->photo);
        }

        //photo saving process
        $newName  = uniqid() . "_student_img" . $request->file('student_img')->extension();
        //save to public file
        $request->file('student_img')->storeAs("public", $newName);
        //save to db
        $student->photo = $newName;

        $student->update();
        $studentName = $student->name;
        return redirect()->route('student.index')->with(['status' => $studentName . " added successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        //delete photo
        if (isset($student->photo)) {
            Storage::delete('public/' . $student->photo);
        }
        $studentName = $student->name;
        $student->delete();
        return redirect()->route('student.index')->with(['status' => $studentName . " deleted successfully"]);
    }
}
