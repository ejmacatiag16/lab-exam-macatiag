@extends('layouts.app')
@section('content')
<h2>Edit Student</h2>
<form method="POST" action="{{ route('students.update', $student) }}">
    @csrf @method('PUT')
    @include('students._form')
</form>
@endsection