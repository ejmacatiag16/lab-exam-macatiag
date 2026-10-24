@extends('layouts.app')
@section('content')
<h2>{{ $student->name }}</h2>
<p><strong>Email:</strong> {{ $student->email }}</p>
<p><strong>Course:</strong> {{ $student->course->name }}</p>
<a href="{{ route('students.index') }}">← Back</a>
@endsection