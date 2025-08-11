@extends('layout.master')
@section('content')
<form action="{{ route('students.update',$student) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        First Name
        <input type="text" name="first_name" value="{{$student->first_name}}">
        @if($errors->has('first_name'))
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
        <br>
        Last Name
        <input type="text" name="last_name"value="{{$student->last_name}}">
        @if($errors->has('last_name'))
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
        <br>
        Gender
        <input type="radio" name="gender" value="1" {{ $student->gender == 1 ? 'checked' : '' }}> Male
        <input type="radio" name="gender" value="0" {{ $student->gender == 0 ? 'checked' : '' }}> Female
        <br>
        Birth Date
        <input type="date" name="date_of_birth"value="{{$student->date_of_birth}}">
        <br>
        <button>Update</button>
    </div>
</form>
@endsection
