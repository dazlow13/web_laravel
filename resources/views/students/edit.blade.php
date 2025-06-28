<form action="{{ route('students.update',$student) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
    First Name
    <input type="text" name="first_name" value="{{$student->first_name}}">
    <br>
    Last Name
    <input type="text" name="last_name"value="{{$student->last_name}}">
    <br>
    Gender
    <input type="radio" name="gender" value="1">Male
    <input type="radio" name="gender" value="0">Female
    <br>
    Birth Date
    <input type="date" name="date_of_birth"value="{{$student->date_of_birth}}">
    <br>
    <button>Update</button>
</form>