@extends('layout.master')

@section('content')
    <table id="courses-table" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
    </table>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
    <!-- Chỉ thêm JS của DataTables, không cần jQuery nữa -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#courses-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("courses.api") }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'edit', name: 'edit', orderable: false, searchable: false },
                    { data: 'destroy', name: 'destroy', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush