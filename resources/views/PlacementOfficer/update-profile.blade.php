@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Update Officer Profile</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('officer.profile.update') }}" method="POST"> 

        
    
        @csrf
        <label>Officer Name</label>
        <input type="text" name="officer_name" class="form-control" value="{{ old('officer_name', $officer->officer_name) }}" required>

        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $officer->email) }}" required>

        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $officer->phone) }}" required>

        <label>Role</label>
        <input type="text" name="role" class="form-control" value="{{ old('role', $officer->role) }}" required>

        <label>Password (Leave blank to keep current password)</label>
        <input type="password" name="password" class="form-control">

        <button type="submit" class="btn btn-primary w-100 mt-3">Update Profile</button>
    </form>
</div>
@endsection
