<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Class</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Include your CSS if needed -->
</head>
<body>
    <div class="container mt-5">
        <h1>Create New Class</h1>
        
        <!-- Display any validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Form to create a new class -->
        <form action="{{ route('clases.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="class_name">Class Name</label>
                <input type="text" name="class_name" id="class_name" class="form-control" value="{{ old('class_name') }}" required>
            </div>

            <div class="form-group">
                <label for="class_code">Class Code</label>
                <input type="text" name="class_code" id="class_code" class="form-control" value="{{ old('class_code') }}" required>
            </div>

            <div class="form-group">
                <label for="class_description">Class Description</label>
                <textarea name="class_description" id="class_description" class="form-control" rows="5" required>{{ old('class_description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Class</button>
        </form>
    </div>

    <script src="{{ asset('js/app.js') }}"></script> <!-- Include your JS if needed -->
</body>
</html>
