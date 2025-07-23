@extends('layout.master')
@section('content')
<div class="card">
    <div class="card-header">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <!-- Nút thêm học sinh mới -->
                <a href="{{ route('students.create') }}" class="btn btn-success">
                    Add New Student
                </a>

                <!-- Form tìm kiếm -->
                <form method="GET" action="{{ route('students.index') }}" class="d-flex align-items-float">
                    <label class="m-1" >Search:</label>
                    <input 
                        type="search" 
                        name="q" 
                        value="{{ request('q') }}" 
                        placeholder="" 
                        class="form-control form-control-sm" 
                        style="width: 100px;" 
                        onkeydown="if(event.key==='Enter'){ this.form.submit(); }"
                    >
                    <button type="submit" style="display: none;"></button>
                </form>
            </div>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->full_name }} </td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->gender_name }}</td>
                        <td> 
                            <a href="{{ route ('students.edit',$student) }}" class="btn btn-primary">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('students.destroy',  $student) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    @if ($students->currentPage() > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $students->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    @for ($i = 1; $i <= $students->lastPage(); $i++)
                        <li class="page-item {{ $students->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $students->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    @if ($students->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $students->nextPageUrl() }}">Next</a>
                        </li>
                    @endif    
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
