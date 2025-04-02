@extends('IndustryProfessionalModule.layouts.recruiterMainLayout')

@section('content')

<div class="container mt-4">
    <h2 class="text-center">Manage Branches</h2>

    <!-- Add Branch Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBranchModal">
        Add Branch
    </button>

    <!-- Branches Table -->
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Branch Name</th>
            </tr>
        </thead>
        <tbody id="branchTable">
            @foreach ($branches as $branch)
            <tr>
                <td>{{ $branch->id }}</td>
                <td>{{ $branch->branch_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Branch Modal -->
<div class="modal fade" id="addBranchModal" tabindex="-1" aria-labelledby="addBranchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBranchModalLabel">Add Branch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addBranchForm">
                    @csrf
                    <div class="mb-3">
                        <label for="branch_name" class="form-label">Branch Name</label>
                        <input type="text" class="form-control" id="branch_name" name="branch_name" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery & AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Add Branch Form Submission
    $('#addBranchForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('admin.branches.add') }}",
            method: "POST",
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    alert('Branch added successfully!');
                    location.reload();
                } else {
                    alert('Failed to add branch');
                }
            },
            error: function(xhr) {
                alert('Error adding branch: ' + xhr.responseText);
            }
        });
    });
});
</script>

@endsection
