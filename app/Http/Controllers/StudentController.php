<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\View;
use App\Enums\StudentStatusEnum;
use App\Models\Course;
use Yajra\DataTables\DataTables;

class StudentController extends Controller
{
    private string $title = 'Student';
    private $model;
    public function __construct()
    {
        $this->model = new Student();
        $routeName = FacadesRoute::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $this->title = implode(' ', $arr);

        $studentStatusEnum = StudentStatusEnum::asArray();
        

        View::share('title', $this->title);
        View::share('studentStatusEnum', $studentStatusEnum);
    }

    public function index()
    {
        return view('students.index');
    }


public function api()
    {
        return DataTables::of(Student::query())
            ->addColumn('full_name', function ($student) {
                return $student->full_name; // Sử dụng accessor
            })
            ->addColumn('age', function ($student) {
                return $student->age; // Sử dụng accessor
            })
            ->addColumn('gender_name', function ($student) {
                return $student->gender_name; // Sử dụng accessor
            })
            ->addColumn('status_name', function ($student) {
                return $student->status_name; // Sử dụng accessor
            })
            ->addColumn('course_name', function ($student) {
                return $student->course_name ?: 'N/A'; // Sử dụng accessor, mặc định N/A nếu null
            })
            ->addColumn('edit', function ($student) {
                return '<a href="' . route('students.edit', $student->id) . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->addColumn('delete', function ($student) {
                return '<form action="' . route('students.destroy', $student->id) . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">' 
                    . csrf_field() 
                    . method_field('DELETE') 
                    . '<button type="submit" class="btn btn-sm btn-danger">Delete</button>'
                    . '</form>';
            })
            ->filterColumn('full_name', function ($query, $keyword) {
                $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$keyword}%"]);
            })
            ->rawColumns(['edit', 'delete'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::query()->get();
        return view(
            'students.create'
            ,
            [
                'courses' => $courses,
            ]
        );
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
        $this->model::create($request->validated());
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
    public function edit($studentId)
    {
        $student = $this->model::findOrFail($studentId);
        return view('students.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, $studentId)
    {
        $this->model::findOrFail($studentId)
            ->update($request->validated());
        return redirect()->route('students.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($studentId)
    {
        $student = $this->model::findOrFail($studentId);
        $student->delete();
        return redirect()->route('students.index');
    }
}
