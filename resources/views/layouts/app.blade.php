<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Student Manager</title>
    <style>
        body { font-family: sans-serif; max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: .5rem; text-align: left; }
        .error { color: #b00020; font-size: .9rem; }
        .success { background: #e6f4ea; padding: .5rem; margin-bottom: 1rem; }
        label { display: block; margin-top: .75rem; }
        input, select { padding: .4rem; width: 100%; box-sizing: border-box; }
        nav { display: flex; justify-content: space-between; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <nav>
        <strong>School of IT Education — Student Manager</strong>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <span>{{ auth()->user()->name }}</span>
                <button type="submit">Logout</button>
            </form>
        @endauth
    </nav>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>
</html> 