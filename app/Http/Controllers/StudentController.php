<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('q');
 
        $students = Student::where('first_name','like',"%$search%")
        ->orWhere('last_name','like',"%$search%")
        ->paginate(2);
        $students->appends(['q' => $search]);
        
        return view('students.index',
            [
            'students' => $students,
            'search' => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
  
        // $student = new Student();
        // $student->first_name = $request->get('first_name');
        // $student->last_name = $request->get('last_name');
        // $student->gender = $request->get('gender');
        // $student->date_of_birth = $request->get('date_of_birth');
        // $student->save();
        Student::create($request->validated());
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('students.edit',[
            'student' => $student,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request,Student $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
