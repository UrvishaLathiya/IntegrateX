@extends('Admin.layouts.adminMainLayout')

@section('content')

<div class="container mt-4">
    <h2 class="text-center">Placement Officers</h2>

    <!-- Search Bar -->
    <div class="mb-3">
        <input type="text" id="searchOfficer" class="form-control" placeholder="Search Officer by Name">
    </div>

    <!-- Add Professor Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProfessorModal">
        Add Professor
    </button>

    <!-- Add Professor Modal -->
<div class="modal fade" id="addProfessorModal" tabindex="-1" aria-labelledby="addProfessorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfessorModalLabel">Add Placement Officer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProfessorForm" method="POST" action="{{ route('officers.add')}}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Officer Name</label>
                        <input type="text" class="form-control" name="officer_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <input type="text" class="form-control" name="role" required>
                    </div>
                    <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    <button type="submit" class="btn btn-primary">Add Officer</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Bootstrap Table -->
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Officer Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="officerTable">
            @foreach ($officers as $officer)
            <tr id="officerRow{{ $officer->id }}">
                <td> {{ $officer->id }}</td>
                <td>{{ $officer->officer_name }}</td>
                <td>{{ $officer->email }}</td>
                <td>{{ $officer->phone }}</td>
                <td>{{ $officer->role }}</td>
                <td>
                    <button type="button" class="btn btn-danger delete-officer" data-id="{{ $officer->id }}">
                    Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AJAX Search Script -->
<script>
    $(document).ready(function () {
        // Add Placement Officer via AJAX
        $('#addProfessorForm').submit(function (event) {
            event.preventDefault(); // Prevent normal form submission
    
            let formData = $(this).serialize(); // Serialize form data
    
            $.ajax({
                url: "{{ route('officers.add') }}",
                method: "POST",
                data: formData,
                success: function (response) {
                    if (response.success) {
                        alert("Placement Officer Added Successfully!");
                        location.reload(); // Reload page to show the new record
                    } else {
                        alert("Error: " + response.error);
                    }
                },
                error: function (xhr) {
                    alert("An error occurred: " + xhr.responseJSON.error);
                }
            });
        });

        // Delete Placement Officer via AJAX
        $(document).on('click', '.delete-officer', function() {
            let officerId = $(this).data('id');

            if (confirm('Are you sure you want to delete this officer?')) {
                $.ajax({
                    url: "{{ route('officers.delete', '') }}/" + officerId,
                    type: "POST", // Laravel doesn't accept DELETE directly in form requests
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE" // Explicitly send DELETE method
                    },
                    success: function(response) {
                        if (response.success) {
                            alert(response.message);
                            $("#officerRow" + officerId).remove(); // Remove row from table
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr) {
                        alert("An error occurred: " + xhr.responseJSON.message);
                    }
                });
            }
        });

        // **Search Functionality**
        $("#searchOfficer").on("keyup", function() {
            let value = $(this).val().toLowerCase();
            $("#officerTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

    });
</script>

    

@endsection
