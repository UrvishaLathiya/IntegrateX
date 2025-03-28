@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<div class="container mt-4">
    <h3 class="text-center">Your Notifications</h3>

    @foreach ($notifications as $notification)
    <div class="card mb-3 {{ $notification->is_read ? 'border-secondary' : 'border-primary' }}">
        <div class="card-body">
            <h5 class="card-title">
                {{ $notification->message }}
                @if (!$notification->is_read)
                    <span class="badge bg-warning">New</span>
                @else
                    <span class="badge bg-secondary">Read</span>
                @endif
            </h5>
    
            @if (!$notification->is_read)
                <a href="{{ route('markAsRead', $notification->id) }}" class="btn btn-primary mark-read">Mark as Read</a>
            @else
                <button class="btn btn-secondary" disabled>Already Read</button>
            @endif
        </div>
    </div>
    @endforeach
    
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".mark-read").click(function (e) {
            e.preventDefault();
            let button = $(this);
            let url = button.attr("href");

            $.ajax({
                url: url,
                type: "GET",
                success: function () {
                    button.closest(".card").removeClass("border-primary").addClass("border-secondary");
                    button.siblings("span").removeClass("bg-warning").addClass("bg-secondary").text("Read");
                    button.replaceWith('<button class="btn btn-secondary" disabled>Already Read</button>');
                },
                error: function () {
                    alert("Error updating notification.");
                }
            });
        });
    });
</script>

@endsection
