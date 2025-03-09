@extends('layouts.master')

@section('content')

<h2 style="text-align: center;">Select Your Skills</h2>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('skills.save') }}" method="POST">
    @csrf

    <div class="skills-container" style="display: flex; gap: 20px; flex-wrap: wrap; justify-content: center;">
        @foreach ($skills as $skill)
            <div class="skill-card" style="border: 1px solid #ddd; padding: 15px; border-radius: 12px; width: 280px; background-color: #f0f8ff; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); text-align: center; transition: transform 0.3s ease-in-out;">
                <h3 style="margin-bottom: 10px;">{{ $skill->name }}</h3>
                <input type="checkbox" id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}"
                    {{ in_array($skill->id, $selectedSkills) ? 'checked' : '' }}>
                <label for="skill_{{ $skill->id }}">Select {{ $skill->name }}</label>
                
                @if ($skill->subsets->count() > 0)
                    <ul style="list-style-type: none; padding: 0; margin-top: 10px;">
                        @foreach ($skill->subsets as $subset)
                            <li>
                                <input type="checkbox" id="subset_{{ $subset->id }}" name="sub_skills[]" value="{{ $subset->id }}"
                                    {{ in_array($subset->id, $selectedSubSkills) ? 'checked' : '' }}>
                                <label for="subset_{{ $subset->id }}">{{ $subset->name }}</label>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <button type="submit" style="padding: 12px 20px; background-color: #007bff; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 16px; transition: background-color 0.3s ease-in-out;">Save Skills</button>
    </div>
</form>

@endsection
