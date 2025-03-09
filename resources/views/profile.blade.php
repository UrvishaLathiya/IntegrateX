@extends('layouts.master')

@push('styles')
<style>
    /* General Page Styling */
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }

    /* Form Container */
    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Form Labels */
    .form-group label {
        font-weight: bold;
        color: #333;
    }

    /* Input Fields */
    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        padding: 8px;
        font-size: 14px;
    }

    /* Error Message */
    .text-danger {
        font-size: 14px;
        margin-top: 5px;
    }

    /* Button Styles */
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

    /* Success Message */
    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        padding: 10px;
        border-radius: 5px;
        margin-top: 15px;
    }
</style>
@endpush

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Edit Profile</h2>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Profile Update Form -->
    <form method="POST" action="{{ route('profile.update', $student->id) }}">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname', $student->firstname) }}" required>
                    @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', $student->lastname) }}" required>
                    @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $student->email) }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>


        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $student->role) }}" required>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $student->age) }}" required>
            @error('age')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $student->address) }}" required>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required>
            @error('phone')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="githubuserid">GitHub User ID</label>
            <input type="text" name="githubuserid" id="githubuserid" class="form-control" value="{{ old('githubuserid', $student->githubuserid) }}" required>
            @error('githubuserid')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Fields -->
        <div class="form-group">
            <label for="password">New Password (Leave blank to keep current)</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
