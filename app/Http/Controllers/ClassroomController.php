<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classRooms = Classroom::all();
        return view('classroom.index',compact('classRooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        $classRoom = new Classroom();
        $classRoom->name = $request->name;
        $classRoom->save();
        $classRoomName = $classRoom->name;
        return redirect()->route('classroom.index')->with(['status' =>  $classRoomName . ' created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('classroom.edit',compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {

        $classroom->name = $request->name;
        $classroom->update();
        $classRoomName = $classroom->name;
        return redirect()->route('classroom.index')->with(['status' =>  $classRoomName . ' updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        $classRoomName = $classroom->name;
        return redirect()->route('classroom.index')->with(['status' =>  $classRoomName . ' deleted successfully']);
    }
}
