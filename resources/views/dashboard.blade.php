<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Student Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <!-- Header from Lab 06 -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1>IT Student Portal</h1>
            <p>Welcome, {{ auth()->user()->name }}.</p>
            <p>Email: {{ auth()->user()->email }}</p>
        </div>
        <!-- Logout Form from Lab 06 -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Lab 07: Register a Book Form (Bootstrap) -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Register a Book</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('books.store') }}">
                @csrf
                
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                        @error('author') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="pages" class="form-label">Pages</label>
                        <input type="number" name="pages" id="pages" class="form-control" value="{{ old('pages') }}" required>
                        @error('pages') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-success">Save Book</button>
            </form>
        </div>
    </div>

    <!-- Lab 07: My Books Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0">My Books</h5>
        </div>
        <div class="card-body">
            @if($books->isEmpty())
                <p class="text-center text-muted my-3">No books registered yet.</p>
            @else
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Pages</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $index => $book)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->pages }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

</div>

</body>
</html>