<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Class</h1>

        <!-- Start Form -->
        <form action="{{ route('clases.update', $clase->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Spoof method for PUT/PATCH request -->

            <!-- Class Name -->
            <div class="mb-3">
                <label for="class_name" class="form-label">Class Name</label>
                <input type="text" class="form-control" id="class_name" name="class_name" value="{{ old('class_name', $clase->class_name) }}" required>
            </div>

            <!-- Class Code -->
            <div class="mb-3">
                <label for="class_code" class="form-label">Class Code</label>
                <input type="text" class="form-control" id="class_code" name="class_code" value="{{ old('class_code', $clase->class_code) }}" required>
            </div>

            <!-- Class Description -->
            <div class="mb-3">
                <label for="class_description" class="form-label">Class Description</label>
                <textarea class="form-control" id="class_description" name="class_description" rows="3" required>{{ old('class_description', $clase->class_description) }}</textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update Class</button>
        </form>
        <!-- End Form -->

        <!-- Back Button -->
        <a href="{{ route('clases.index') }}" class="btn btn-secondary mt-3">Back to Class List</a>
    </div>
</body>
</html>
