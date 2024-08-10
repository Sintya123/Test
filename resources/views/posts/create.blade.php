<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS here -->
</head>
<body>
    <div class="container">
        <h1>Create a New Post</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to create a new post -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image (optional)</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
            <a href="{{ route('profile') }}">
                <button type="button">Back</button>
            </a>

        </form>
    </div>
</body>
</html>
