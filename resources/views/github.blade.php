@extends('layouts.master')

@section('title', $student->githubuserid . " GitHub Repositories")

@push('styles')
<style>
    /* Card Container Styling */
    .row {
        display: flex;
        justify-content: space-evenly; /* Equal spacing between cards */
        gap: 30px;
        flex-wrap: nowrap; /* Ensure all cards are in a single row */
        overflow-x: auto; /* Enable horizontal scroll for large screens if needed */
        padding: 20px 0; /* Padding for spacing */
    }

    /* Card Style */
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        background: linear-gradient(145deg, #a2c2e2, #8bb6d4); /* Light Blue Gradient */
        color: #fff;
        display: flex;
        flex-direction: column;
        height: 200px; /* Reduced card height */
        width: 200px; /* Reduced card width */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    /* Hover Effect */
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    /* Card Body */
    .card-body {
        flex-grow: 1;
        padding: 20px;
        text-align: center;
        overflow: hidden;
    }

    .card-body .card-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .card-body .card-title a {
        text-decoration: none;
        color: #fff;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .card-body .card-title a:hover {
        color: #00ff00; /* Green on hover */
    }

    .card-body .card-text {
        font-size: 0.85rem;
        color: rgba(255, 255, 255, 0.8);
        margin-top: 10px;
        height: 50px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    /* Card Footer */
    .card-footer {
        background: rgba(255, 255, 255, 0.1);
        border-top: 2px solid #ffffff;
        padding: 8px 15px;
        text-align: center;
        font-size: 0.8rem;
        color: #ffffff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-footer i {
        color: #FFD700;
        margin-right: 5px;
    }

    /* Responsive Design for small screens */
    @media (max-width: 767px) {
        .row {
            flex-wrap: wrap; /* Wrap cards to next line on small screens */
            justify-content: center;
        }
        .card {
            width: 90%; /* Cards take 90% of the screen width on mobile */
            height: auto; /* Auto height */
        }
    }

    /* No repositories message */
    .no-repos {
        color: #333;
        font-size: 1.2em;
        margin-top: 20px;
    }
</style>
@endpush

@section('content')
    <div class="container text-center">
        <h2 class="mb-4">{{ $student->githubuserid }} GitHub Repositories</h2>
        @if(count($repos) > 0)
            <div class="row">
                @foreach($repos as $repo)
                    <div class="col">
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
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-repos">No repositories found.</p>
        @endif
    </div>
@endsection
