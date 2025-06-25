<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <div class="form-group">
    First Name
    <input type="text" name="first_name">
    <br>
    Last Name
    <input type="text" name="last_name">
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