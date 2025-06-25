<h1>
    Students List
</h1>
<a href="{{ route ('students.create') }}" class="btn btn-primary">
    Add New Student
</a>
<table border="1" width="100%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </tr>
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->full_name }} </td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->gender_name }}</td>
        </tr>
    @endforeach
</table>