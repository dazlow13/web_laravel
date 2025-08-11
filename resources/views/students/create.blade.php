@extends('layout.master')
@section('content')
<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
    First Name
    <input type="text" name="first_name" value="{{ old('first_name') }}">
        @if($errors->has('first_name'))
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
    <br>
    Last Name
    <input type="text" name="last_name" value="{{ old('last_name') }}">
        @if($errors->has('last_name'))
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
    <br>
    Gender
    <input type="radio" name="gender" value="1">Male
    <input type="radio" name="gender" value="0">Female
    <br>
    Birth Date
    <input type="date" name="date_of_birth">
    <br>
    Status
    @foreach ($studentStatusEnum as $option => $item)
        <input type="radio" name="status" value="{{ $option }}" {{ old('status') == $option ? 'checked' : '' }}>
        {{ $item }}
        @if($errors->has('status'))
            <span class="text-danger">{{ $errors->first('status') }}</span>
        @endif        
    @endforeach
    <br>
    Course
    <select name="course_id">
        @foreach ($courses as $course)
            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
        </select>
    <button>Create</button>
    </div>
</form>
@endsection