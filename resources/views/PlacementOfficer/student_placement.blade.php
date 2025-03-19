@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark fw-bold mb-4">🎓 Student Placement Dashboard</h1>

    <!-- 🛠 Filter Form -->
    <form action="{{ route('student.placement') }}" method="GET" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="year" class="form-select">
                <option value="">📅 Filter by Year</option>
                @foreach($years as $year)
                    <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="branch_id" class="form-select">
                <option value="">🏛️ Filter by Branch</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}" {{ request('branch_id') == $branch->id ? 'selected' : '' }}>
                        {{ $branch->branch_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select name="skill_id" class="form-select">
                <option value="">💡 Filter by Skill</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ request('skill_id') == $skill->id ? 'selected' : '' }}>
                        {{ $skill->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100">🔍 Apply Filters</button>
        </div>
    </form>

    <!-- 📋 Student Skills Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>📌 Student ID</th>
                    <th>👨‍🎓 Name</th>
                    <th>📅 Year</th>
                    <th>🏛️ Branch</th>
                    <th>💡 Skills</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                        <td>{{ $student->year }}</td>
                        <td>{{ $student->branch->branch_name ?? 'N/A' }}</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($student->skillSubsets as $subset)
                                    <li>✅ {{ $subset->name }} ({{ $subset->skill->name }})</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
@endsection
