@extends('Admin.layouts.adminMainLayout')

@section('content')

<div class="container mt-4">
    <h2 class="text-center">Students</h2>

    <!-- Search Bar -->
    <div class="row mb-3">
        <!-- Search Bar -->
        <div class="col-md-4">
            <input type="text" id="searchStudent" class="form-control" placeholder="Search Student by Name">
        </div>
    <!-- Placement Status Filter -->
    <div class="col-md-3">
        <select id="placementFilter" class="form-control">
            <option value="">All</option>
            <option value="Placed">Placed</option>
            <option value="Shortlisted">Shortlisted</option>
            <option value="Not Placed">Not Placed</option>
        </select>
    </div>
</div>

    

    <!-- Bootstrap Table -->
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Age</th>
                <th>Address</th>
                <th>Role</th>
                <th>GitHub User ID</th>
                <th>Year</th>
                <th>Branch ID</th>
                <th>Placement Status</th>
            </tr>
        </thead>
        <tbody id="studentTable">
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->role }}</td>
                <td>{{ $student->githubuserid }}</td>
                <td>{{ $student->year }}</td>
                <td>{{ $student->branch->branch_name ?? 'N/A' }}</td>
                <td>{{ $student->placement_status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>



<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX Script -->
<script>
$(document).ready(function() {
    // Search functionality
    $('#searchStudent').on('keyup', function() {
        let query = $(this).val();

        $.ajax({
            url: "{{ route('students.search') }}",
            method: "GET",
            data: { search: query },
            success: function(response) {
                $('#studentTable').html(response);
            }
        });
    });

    // Placement Status Filter
    $('#placementFilter').on('change', function() {
        let status = $(this).val();

        $.ajax({
            url: "{{ route('students.filter') }}",
            method: "GET",
            data: { placement_status: status },
            success: function(response) {
                $('#studentTable').html(response);
            }
        });
    });

    // Add student form submission
    $('#addStudentForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission

        $.ajax({
            url: "{{ route('students.add') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    alert('Student added successfully!');
                    location.reload();
                } else {
                    alert('Failed to add student: ' + response.error);
                }
            },
            error: function(xhr) {
                alert('Error adding student: ' + xhr.responseText);
            }
        });
    });
});
</script>

@endsection
