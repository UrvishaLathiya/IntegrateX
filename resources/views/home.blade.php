@extends('layouts.master')

@section('content')
<section class="pt-page pt-page-1 section-with-bg" style="background-image: url(images/home_page_bg_1.jpg);" data-id="home">
    <div class="home-page-block">
        <div class="v-align">
            @if(Session::has('student_id'))
                <?php $student = \App\Models\Student::find(Session::get('student_id')); ?>
                <p>Welcome, {{ $student->firstname }}!</p>
                <ul>
                    <li><strong>Role:</strong> {{ $student->role }}</li>
                    <li><strong>Age:</strong> {{ $student->age }}</li>
                    <li><strong>Address:</strong> {{ $student->address }}</li>
                    <li><strong>Email:</strong> {{ $student->email }}</li>
                    <li><strong>Phone:</strong> {{ $student->phone }}</li>
                    <li><strong>Skills:</strong> {{ $student->skill }}</li>
                    <li><strong>GitHub Username:</strong> {{ $student->githubuserid }}</li>
                </ul>
                 <!-- Logout Form -->
            
            @else
                <p>Please <a href="{{ route('student.login') }}">login</a> to view your details.</p>
            @endif
        </div>
    </div>
</section>
@endsection
