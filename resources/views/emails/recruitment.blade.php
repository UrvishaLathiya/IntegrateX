<!DOCTYPE html>
<html>
<head>
    <title>Campus Recruitment Alert</title>
</head>
<body>
    <p><strong>Placement Officer: {{ $officerName }}</strong></p>
    <p>Dear All,</p>

    <p>Go through the trailing mail and the attached job profiles for more information.</p>
    <p>This is a non-technical job, so only interested students are required to register here by {{ $recruitmentDetails['registration_deadline'] }}.</p>

    <p><strong>Link to register:</strong></p>
    <p><a href="https://docs.google.com/forms/d/1xCaybL7D-a4ZrfhWjegCnGZ-1ht6dECwIRXvWDRnMgs/edit">registration_link</a></p>

    <p>Best Regards,</p>
    <p>{{ $recruitmentDetails['recruiter_name'] }}</p>
    <p>{{ $recruitmentDetails['company_profile'] }}</p>

    <hr>

    <h3>Company Overview:</h3>
    <p>{{ $recruitmentDetails['company_profile'] }}</p>
    <p><strong>Website:</strong> <a href="{{ $recruitmentDetails['company_website'] }}">{{ $recruitmentDetails['company_website'] }}</a></p>

    <h3>Job Details:</h3>
    <p><strong>Role:</strong> {{ $recruitmentDetails['job_role'] }}</p>
    <p><strong>Location:</strong> {{ $recruitmentDetails['location'] }}</p>
    <p><strong>Remuneration:</strong> {{ $recruitmentDetails['remuneration'] }}</p>
    <p><strong>Requirements:</strong> {{ $recruitmentDetails['requirements'] }}</p>
    <p><strong>Interview Process:</strong> {{ $recruitmentDetails['interview_process'] }}</p>

    <h3>Why Join?</h3>
    <ul>
        <li>Innovative learning solutions</li>
        <li>Networking across sectors</li>
        <li>Career advancement</li>
        <li>Fast-paced culture</li>
        <li>Good earning potential</li>
    </ul>

    <h3>Job Locations:</h3>
    <p>{{ $recruitmentDetails['location'] }}</p>
</body>
</html>
