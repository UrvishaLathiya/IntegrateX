@extends('PlacementOfficer.layouts.officerMaster')

@section('content')
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-4xl bg-white p-8 rounded-lg shadow-md text-center">
        <h2 class="text-3xl font-semibold">Welcome, {{ session('officer_name') }}</h2>
        <p class="text-gray-600 mt-2">Your Role: {{ session('role') }}</p>
        <p class="text-gray-500 mt-2">Email: {{ session('officer_email') }}</p>

        <div class="mt-4">
            

        </div>
    </div>

@endsection
