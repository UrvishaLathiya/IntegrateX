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
        margin-bottom: 5px;
        display: block;
    }

    /* Input Fields */
    .form-control {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 12px;
        font-size: 16px;
        transition: all 0.3s ease-in-out;
        width: 100%;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        outline: none;
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
        padding: 12px 20px;
        border-radius: 8px;
        font-size: 16px;
        transition: 0.3s;
        width: 100%;
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center font-weight-bold">Update Profile</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('profile.update', $student->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $student->firstname) }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $student->lastname) }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" class="form-control" value="{{ old('role', $student->role) }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" value="{{ old('age', $student->age) }}" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $student->phone) }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address', $student->address) }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="githubuserid">GitHub User ID</label>
                            <input type="text" name="githubuserid" class="form-control" value="{{ old('githubuserid', $student->githubuserid) }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">New Password (Leave blank if not changing)</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mt-3">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
