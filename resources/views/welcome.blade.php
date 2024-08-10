<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>
    <h1>Profile</h1>
    
    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/profile/update') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
        <br><br>
        <button type="submit">Update Profile</button>
    </form>

    <a href="{{ url('/home') }}">Back to Home</a>
</body>
</html>
