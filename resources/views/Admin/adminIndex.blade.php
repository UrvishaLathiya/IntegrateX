@extends('Admin.layouts.adminMainLayout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        .custom-card {
            min-height: 200px;
            border-radius: 15px;
            transition: 0.3s;
            color: black;
            width: 100%;
        }
        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }
        .bg-students { background: linear-gradient(135deg, #b3e5fc, #e3f2fd); }
        .bg-professors { background: linear-gradient(135deg, #c8e6c9, #e8f5e9); }
    </style>

    <div class="container-fluid pt-4 px-4 d-flex flex-column align-items-center">
        <div class="row g-4 justify-content-center text-center w-100">
            <div class="col-md-3 d-flex">
                <div class="card custom-card bg-students shadow w-100">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-users fa-4x mb-3"></i>
                        <p class="mb-1 fs-5 fw-bold">Total Students</p>
                        <h3 class="mb-0">{{ $totalStudents }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-flex">
                <div class="card custom-card bg-professors shadow w-100">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chalkboard-teacher fa-4x mb-3"></i>
                        <p class="mb-1 fs-5 fw-bold">Total Professors</p>
                        <h3 class="mb-0">{{ $totalProfessors }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Centered Button (Moved Lower) -->
        <div class="mt-5">
            <a href="{{ route('admin.backup') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-download"></i> Download Database Backup
            </a>
        </div>
    </div>
@endsection
