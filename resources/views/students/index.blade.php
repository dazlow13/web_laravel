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
                    <button>Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>