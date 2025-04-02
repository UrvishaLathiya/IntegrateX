@extends('IndustryProfessionalModule.layouts.recruiterMainLayout')

@section('content')
<div class="container mt-4">
    <h2 class="text-center">Placement Officers</h2>

    <!-- Search Bar -->
    <div class="mb-3">
        <input type="text" id="searchOfficer" class="form-control" placeholder="Search Officer by Name">
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
                <th>Notification Read Status</th>
            </tr>
        </thead>
        <tbody id="officerTable">
            @foreach ($officers as $officer)
            <tr>
                <td>{{ $officer->id }}</td>
                <td>{{ $officer->officer_name }}</td>
                <td>{{ $officer->email }}</td>
                <td>{{ $officer->phone }}</td>
                <td>{{ $officer->role }}</td>
                <td>
                    <!-- Send Recruitment Alert Button -->
                    <button class="btn btn-primary sendAlertBtn" 
                        data-officer-id="{{ $officer->id }}" 
                        data-officer-name="{{ $officer->officer_name }}">
                        Send Recruitment Alert
                    </button>
                </td>
                <td>
                    @php
                        $notification = $officer->notifications->first();
                    @endphp
                    @if (!$notification)
                        🟡 Not sent yet
                    @elseif (!$notification->is_read)
                        ❌ Unread
                    @else
                        ✅ Read
                    @endif
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal for Recruitment Form -->
<div class="modal fade" id="recruitmentModal" tabindex="-1" aria-labelledby="recruitmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="recruitmentModalLabel">Campus Recruitment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Recruitment Form -->
                <form id="recruitmentForm">
                    @csrf
                    <input type="hidden" id="officer_id" name="officer_id">
                    <div class="mb-3">
                        <label class="form-label">Company Profile</label>
                        <input type="text" class="form-control" name="company_profile" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Job Role</label>
                        <input type="text" class="form-control" name="job_role" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Remuneration</label>
                        <input type="number" class="form-control" name="remuneration" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Requirements</label>
                        <textarea class="form-control" name="requirements" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Interview Process</label>
                        <textarea class="form-control" name="interview_process" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Send Mail & Notification</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- CSRF Token for AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Set up CSRF token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Open modal when "Send Recruitment Alert" button is clicked
        $(".sendAlertBtn").click(function() {
            let officerId = $(this).data("officer-id");
            let officerName = $(this).data("officer-name");

            $("#officer_id").val(officerId);
            $("#recruitmentModalLabel").text("Send Recruitment Alert to " + officerName);
            $("#recruitmentModal").modal("show");
        });

        // Submit form via AJAX
        $("#recruitmentForm").submit(function(event) {
            event.preventDefault();
            
            $.ajax({
                url: "{{ route('send.recruitment.alert') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    alert(response.message);
                    $("#recruitmentModal").modal("hide");
                },
                error: function(xhr) {
                    console.log(xhr.responseText);  // Log error response in console
                    alert("Something went wrong! Please check the console for details.");
                }
            });
        });

        // Search functionality
        $("#searchOfficer").on("keyup", function() {
            let value = $(this).val().toLowerCase();
            $("#officerTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

@endsection
