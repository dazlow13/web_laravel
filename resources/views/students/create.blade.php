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
    <button>Create</button>
</form>