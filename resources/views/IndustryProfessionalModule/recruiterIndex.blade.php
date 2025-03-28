@extends('IndustryProfessionalModule.layouts.recruiterMainLayout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <style>
        .custom-card {
            min-height: 200px;
            border-radius: 15px;
            transition: 0.3s;
            color: black; /* Changed text color to black for better readability */
        }
        .custom-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }
        .bg-students { background: linear-gradient(135deg, #b3e5fc, #e3f2fd); } /* Light Blue */
        .bg-professors { background: linear-gradient(135deg, #c8e6c9, #e8f5e9); } /* Light Green */
        .bg-branch { background: linear-gradient(135deg, #ffecb3, #fff8e1); } /* Light Yellow */
        .bg-skills { background: linear-gradient(135deg, #e1bee7, #f3e5f5); } /* Light Purple */
    </style>
    

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card custom-card bg-students text-center shadow">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-users fa-4x mb-3"></i>
                        <p class="mb-1 fs-5 fw-bold">Total Students</p>
                        {{-- <h3 class="mb-0">{{ $totalStudents }}</h3> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card custom-card bg-professors text-center shadow">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-chalkboard-teacher fa-4x mb-3"></i>
                        <p class="mb-1 fs-5 fw-bold">Total Professors</p>
                        {{-- <h3 class="mb-0">{{ $totalProfessors }}</h3> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card custom-card bg-branch text-center shadow">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-code-branch fa-4x mb-3"></i>
                        <p class="mb-1 fs-5 fw-bold">Today Branch</p>
                        {{-- <h3 class="mb-0">{{ $totalBranchs }}</h3> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card custom-card bg-skills text-center shadow">
                    <div class="card-body d-flex align-items-center justify-content-center flex-column">
                        <i class="fa fa-lightbulb fa-4x mb-3"></i>
                        <p class="mb-1 fs-5 fw-bold">Total Skills</p>
                        {{-- <h3 class="mb-0">{{ $totalSkills }}</h3> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
