<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route as FacadesRoute;



class CourseController extends Controller
{
    private string $title = 'Course';
    private $model;
    public function __construct()
    {
        $this->model = new Course();
        $routeName = FacadesRoute::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $this->title = implode(' ', $arr);
        View::share('title', $this->title);
    }
    public function index()
    {
        return view('courses.index');
    }

    public function api()
    {
        return DataTables::of(Course::query())
            ->addColumn('created_at', function ($object) {
                return $object->created_at->format('Y-m-d H:i:s');
            })
            ->addColumn('edit', function ($object) {
                return '<a href="' . route('courses.edit', $object->id) . '" class="btn btn-sm btn-primary">Edit</a>';
            })
            ->addColumn('destroy', function ($object) {
                return '<form action="' . route('courses.destroy', $object->id) . '" method="POST" onsubmit="return confirm(\'Are you sure?\');">'
                    . csrf_field()
                    . method_field('DELETE')
                    . '<button type="submit" class="btn btn-sm btn-danger">Delete</button>'
                    . '</form>';
            })
            ->rawColumns(['edit', 'destroy']) // Cho phép hiển thị HTML
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
