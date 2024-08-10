<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <title>User Profile</title>
    <style>
        /* CSS untuk halaman profil pengguna */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            color: #28a745;
            font-size: 16px;
            margin: 10px 0;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome, {{ $user->name }}</h1>
    <p>Email: {{ $user->email }}</p>

    <!-- Button to create a new post -->
    <a href="{{ route('posts.create') }}">
        <button type="button">Create New Post</button>
    </a>
    <a href="{{ route('posts.index') }}">
        <button type="button">View All Posts</button>
    </a>

    <!-- Logout form -->
    <form action="{{ route('logout') }}" method="GET">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
