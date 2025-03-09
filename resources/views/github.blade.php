@extends('layouts.master')

@section('title', $student->githubuserid . " GitHub Repositories")

@push('styles')
<style>
    /* Container Styling */
    .container {
        max-width: 900px; /* Keeps the layout neat */
    }

    /* Grid Layout for Cards */
    .repo-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 cards per row */
        gap: 20px; /* Spacing between cards */
        justify-content: center;
        padding: 20px 0;
    }

    /* Card Styling */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        background: linear-gradient(145deg, #a2c2e2, #8bb6d4);
        color: #0a0909;
        display: flex;
        flex-direction: column;
        width: 100%; /* Takes full grid space */
        height: 200px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    /* Card Content */
    .card-body {
        flex-grow: 1;
        padding: 15px;
        text-align: center;
        overflow: hidden;
    }

    .card-title a {
        text-decoration: none;
        color: #030303;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .card-title a:hover {
        color: #00ff00;
    }

    .card-text {
        font-size: 0.85rem;
        color: rgba(12, 12, 12, 0.8);
        margin-top: 5px;
        height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Card Footer */
    .card-footer {
        background: rgba(255, 255, 255, 0.1);
        border-top: 2px solid #111111;
        padding: 8px 10px;
        text-align: center;
        font-size: 0.8rem;
        color: #0d0d0d;
        display: flex;
        justify-content: space-between;
    }

    .card-footer i {
        color: #FFD700;
        margin-right: 5px;
    }

    /* Responsive Layout */
    @media (max-width: 900px) {
        .repo-grid {
            grid-template-columns: repeat(2, 1fr); /* 2 cards per row on tablets */
        }
    }

    @media (max-width: 600px) {
        .repo-grid {
            grid-template-columns: repeat(1, 1fr); /* 1 card per row on small screens */
        }
    }
</style>
@endpush

@section('content')
<div class="container text-center">
    <h2 class="mb-4">{{ $student->githubuserid }} GitHub Repositories</h2>
    @if(count($repos) > 0)
        <div class="repo-grid">
            @foreach($repos as $repo)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ $repo['html_url'] }}" target="_blank">
                                <i class="fab fa-github"></i> {{ $repo['name'] }}
                            </a>
                        </h5>
                        <p class="card-text">{{ $repo['description'] ?? 'No description available' }}</p>
                    </div>
                    <div class="card-footer">
                        <span><i class="fas fa-star"></i> {{ $repo['stargazers_count'] }} stars</span>
                        <span><i class="fas fa-code-branch"></i> {{ $repo['forks_count'] }} forks</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="no-repos">No repositories found.</p>
    @endif
</div>
@endsection
