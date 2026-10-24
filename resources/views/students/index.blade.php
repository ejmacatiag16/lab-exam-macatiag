@extends('layouts.app')
@section('content')
<h2>Students</h2>
<a href="{{ route('students.create') }}">+ Add Student</a>

<table>
    <thead>
        <tr><th>Name</th><th>Email</th><th>Course</th><th>Actions</th></tr>
    </thead>
    <tbody>
    @forelse ($students as $student)
        <tr>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->course->name }}</td>
            <td>
                <a href="{{ route('students.show', $student) }}">View</a>
                @can('update', $student)
                    <a href="{{ route('students.edit', $student) }}">Edit</a>
                @endcan
                @can('delete', $student)
                    <form method="POST" action="{{ route('students.destroy', $student) }}"
                          style="display:inline" onsubmit="return confirm('Delete this student?')">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endcan
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No students yet.</td></tr>
    @endforelse
    </tbody>
</table>
@endsection