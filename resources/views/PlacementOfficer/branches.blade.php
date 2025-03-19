@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<div class="container">
    <h2>Manage Branches</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Branch List -->
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Branch Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($branches as $branch)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Auto-increment row number -->
                    <td>{{ $branch->branch_name }}</td> <!-- Display branch name -->
                </tr>
            @endforeach
        </tbody>
    </table>
    

    <!-- Add New Branch Form -->
    <form action="{{ route('branches.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Branch Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Branch</button>
    </form>
</div>
@endsection