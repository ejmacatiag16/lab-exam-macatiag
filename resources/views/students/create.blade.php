@extends('layouts.app')
@section('content')
<h2>Add Student</h2>
<form method="POST" action="{{ route('students.store') }}">
    @csrf
    @include('students._form')
</form>
@endsection