@extends('layouts.master')

@push('styles')
<style>
    /* Page Styling */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-weight: bold;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ced4da;
        font-size: 14px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #0056b3;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        margin-top: 15px;
    }

    /* Grid Layout for Cards */
    .project-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .card {
        background: white;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card h4 {
        color: #007bff;
    }

    .card p {
        margin: 5px 0;
        color: #333;
    }

    .card a {
        text-decoration: none;
        color: #28a745;
    }

    .card a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Add New Project</h2>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Project Submission Form -->
  

    <form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <input type="hidden" name="student_id" value="{{ session('student_id') }}">

    <div class="form-group">
        <label>Project Name:</label>
        <input type="text" name="project_name" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Frontend:</label>
        <input type="text" name="frontend" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Backend:</label>
        <input type="text" name="backend" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Database:</label>
        <input type="text" name="database" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Live Demo (Optional):</label>
        <input type="url" name="live_demo" class="form-control">
    </div>

    <div class="form-group">
        <label>Description:</label>
        <textarea name="description" class="form-control" rows="3" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


    <h2 class="text-center mt-4">Your Projects</h2>

    @if($projects->isEmpty())
        <p class="text-center text-gray-500">No projects found. Add a new project!</p>
    @else
        <div class="project-grid">
            @foreach($projects as $project)
                <div class="card">
                    <h4>{{ $project->project_name }}</h4>
                    <p><strong>Frontend:</strong> {{ $project->frontend }}</p>
                    <p><strong>Backend:</strong> {{ $project->backend }}</p>
                    <p><strong>Database:</strong> {{ $project->database }}</p>
                    <p><strong>Description:</strong> {{ $project->description }}</p>
                    <p>
                        <strong>Live Demo:</strong> 
                        @if($project->live_demo)
                            <a href="{{ $project->live_demo }}" target="_blank">View</a>
                        @else
                            N/A
                        @endif
                    </p>
                </div>
            @endforeach
        </div>
    @endif
    </div>
@endsection
