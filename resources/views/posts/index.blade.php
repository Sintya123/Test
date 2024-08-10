<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS here -->
    <style>
        .post-table {
            width: 100%;
            border-collapse: collapse;
        }
        .post-table th, .post-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .post-table th {
            background-color: #f4f4f4;
            text-align: left;
        }
        .post-image {
            width: 100px; /* Adjust the width as needed */
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All Posts</h1>
        <a href="{{ route('profile') }}">
            <button type="button">Profile</button>
        </a>

        <!-- Check if there are any posts -->
        @if ($posts->isEmpty())
            <p>No posts found.</p>
        @else
            <table class="post-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/' . $post->image_path) }}" class="post-image" alt="Post Image">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->content, 100) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
