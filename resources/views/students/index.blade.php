<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Added Bootstrap Icons for a better look -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/引入/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<style>
    .card-header {
            background: linear-gradient(to right, #1d5297, #419fc4) !important;
}
</style>
</head>
<body class="bg-light">

    <!-- This for Add New Student-->
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">
            <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i> Student List</h4>
            <a href="{{ route('students.create') }}" class="btn btn-light btn-sm fw-bold">
                <i class="bi bi-plus-lg"></i> Add New Student
            </a>
        </div>

          <!--This is for Import File Feature-->

        <div class="bg-white p-4 rounded-lg shadow-sm mb-6 border border-gray-100">
    <form action="{{ route('students.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-4">
        @csrf
        <div class="flex-1">
            <label class="block text-xs font-bold text-gray-600 uppercase mb-1">Bulk Import (CSV/Excel)</label>
            <input type="file" name="file" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
        </div>
        <button type="submit" class="card-header bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md font-bold transition">
            Import Now
        </button>
    </form>
</div>
        
        <div class="card-body">
            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Course</th>
                            <th width="180px" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td><span class="badge bg-info text-dark">{{ $student->course }}</span></td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Permanently delete {{ $student->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ms-1">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No students found. <a href="{{ route('students.create') }}">Click here to add one.</a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS (needed for alert dismissal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>