@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<div class="d-flex justify-content-center align-items-start mt-5">
    <div class="card shadow-lg p-4" style="width: 30rem;">
        <div class="card-body text-center">
            <h2 class="card-title fw-bold">Welcome, {{ session('officer_name') }}</h2>
            <p class="text-primary fw-semibold">Your Role: <strong>{{ session('role') }}</strong></p>
            <p class="text-success fw-semibold">Email: <strong>{{ session('officer_email') }}</strong></p>
        </div>
    </div>
</div>
@endsection
