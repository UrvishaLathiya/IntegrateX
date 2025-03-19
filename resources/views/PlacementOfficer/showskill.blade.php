@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
    <div class="container mt-5">

        <!-- 📊 Chart Section -->
        <div class="mb-6">
            <h2 class="text-center text-primary mb-4">Student Skill Distribution</h2>
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <canvas id="skillsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- 📋 Student Skills Table -->
        <div>
            <h2 class="text-center text-primary mb-4">Student Skill Dashboard</h2>
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Skills</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td class="fw-bold">{{ $student->firstname }} {{ $student->lastname }}</td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach ($student->skillSubsets as $skillSubset)
                                                <li>
                                                    <i class="fas fa-cogs text-primary"></i> 
                                                    {{ $skillSubset->name }} 
                                                    <small class="text-muted">({{ $skillSubset->skill->name }})</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('skillsChart').getContext('2d');

            var chartData = @json($chartData); // Pass PHP data to JavaScript

            var studentNames = chartData.map(data => data.name);
            var skillCounts = chartData.map(data => data.count);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: studentNames,
                    datasets: [{
                        label: 'Skills Count',
                        data: skillCounts,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            ticks: { color: "#333" }
                        },
                        y: {
                            ticks: { color: "#333" },
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#333',
                                font: { size: 14 }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
