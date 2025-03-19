@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark fw-bold mb-4">📋 Manage Skills & Assign to Students</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- 🆕 Add New Skill -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">➕ Add New Skill</div>
        <div class="card-body">
            <form action="{{ route('placement.store-skill') }}" method="POST">
                @csrf
                <input type="text" name="name" class="form-control mb-2" placeholder="Enter Skill Name" required>
                <button type="submit" class="btn btn-success d-block mx-auto mt-2">Add Skill</button>

            </form>
        </div>
    </div>

    <!-- 🆕 Add New Sub-Skill -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">➕ Add New Sub-Skill</div>
        <div class="card-body">
            <form action="{{ route('placement.store-sub-skill') }}" method="POST">
                @csrf
                <select name="skill_id" class="form-select mb-2" required>
                    <option value="">Select Skill</option>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
                <input type="text" name="name" class="form-control mb-2" placeholder="Enter Sub-skill Name" required>
                <button type="submit" class="btn btn-info d-block mx-auto mt-2">Add Sub-Skill</button>

            </form>
        </div>
    </div>

    <!-- 📋 Skill & Sub-Skill Table -->
    <h2 class="text-center mt-4">📊 Skills & Sub-Skills</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>💡 Skill</th>
                    <th>📌 Sub-skills</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <td><strong>{{ $skill->name }}</strong></td>
                        <td>
                            <ul class="list-unstyled">
                                @forelse($skill->subsets as $subset)
                                    <li>✅ {{ $subset->name }}</li>
                                @empty
                                    <li>No Sub-skills</li>
                                @endforelse
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
