<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::get();
        return view('students.index',
            ['students' => $students]
        );
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
        Student::create($request->only([
            'first_name',
            'last_name',
            'gender',
            'date_of_birth',
        ]));
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
    public function update(Request $request,Student $student)
    {
        $student->update([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'gender' => $request->input('gender'),
        'date_of_birth' => $request->input('date_of_birth'),
    ]);

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
