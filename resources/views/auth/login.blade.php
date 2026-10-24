@extends('layouts.app')
@section('content')
<h2>Login</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <label>Email
        <input type="email" name="email" value="{{ old('email') }}">
    </label>
    @error('email') <div class="error">{{ $message }}</div> @enderror

    <label>Password
        <input type="password" name="password">
    </label>
    @error('password') <div class="error">{{ $message }}</div> @enderror

    <br><button type="submit">Login</button>
</form>
@endsection