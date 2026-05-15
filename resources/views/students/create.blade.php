<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | Management System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(to right, #1d5297, #4b7bb6) !important;
            padding: 1.5rem;
            text-align: center;
        }
        .form-label {
            font-weight: 600;
            color: #444;
            font-size: 0.9rem;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 10px rgba(29, 151, 108, 0.2);
            border-color: #1d5297;
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 8px 0 0 8px;
            color: #1d5297;
        }
        .btn-success {
            background: #1d5297;
            border: none;
            padding: 0.8rem;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-success:hover {
            background: #1d5297;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .btn-secondary {
            border-radius: 8px;
            padding: 0.8rem;
        }
        .animate-up {
            animation: fadeInUp 0.6s ease-out;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg animate-up">
                <div class="card-header text-white">
                    <h3 class="mb-0 fw-bold"><i class="fas fa-user-plus me-2"></i>Add Student</h3>
                    <small class="opacity-75">Please fill in the details below</small>
                </div>
                <div class="card-body p-4 p-md-5">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger border-0 shadow-sm mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        
                        <!-- Full Name -->
                        <div class="mb-4">
                            <label class="form-label">Full Name</label>
                            <div class="input-group">
                                
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name Father Surname">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <div class="input-group">
                                
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="shivam@example.com">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Phone -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Phone Number</label>
                                <div class="input-group">
                                    
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="0123456789">
                                </div>
                            </div>
                            <!-- Course -->
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Course</label>
                                <div class="input-group">
                                    
                                    <input type="text" name="course" class="form-control" value="{{ old('course') }}" placeholder="B.Tech">
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-4">
                            <label class="form-label">Home Address</label>
                            <div class="input-group">
                                
                                <textarea name="address" class="form-control" rows="2" placeholder="Street, City, Country">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="d-grid gap-3 pt-2">
                            <button type="submit" class="btn btn-success text-uppercase">
                                <i class="fas fa-save me-2"></i>Save Student Record
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Return to List
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>