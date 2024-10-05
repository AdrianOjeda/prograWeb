<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>List of Classes</h1>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Class Name</th>
                    <th>Class Code</th>
                    <th>Class Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clases as $clase)
                <tr>
                    <td>{{ $clase->id }}</td>
                    <td>{{ $clase->class_name }}</td>
                    <td>{{ $clase->class_code }}</td>
                    <td>{{ $clase->class_description }}</td>
                    <td>
                        <a href="{{ route('clases.show', $clase->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('clases.edit', $clase->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('clases.destroy', $clase->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
