<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Class Details</h1>

        <div class="card mt-3">
            <div class="card-header">
                <h2>{{ $clase->class_name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Class Code:</strong> {{ $clase->class_code }}</p>
                <p><strong>Description:</strong> {{ $clase->class_description }}</p>
            </div>
        </div>

        <a href="{{ route('clases.index') }}" class="btn btn-primary mt-3">Back to Class List</a>
    </div>
</body>
</html>
