<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Selection</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/final.webp')}}" />
    <style>
        body {
            background-color: #121212;
            color: rgb(198, 196, 196);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            text-align: center;
        }
        .btn-custom {
            font-size: 18px;
            padding: 12px 24px;
            border-radius: 8px;
            width: 200px;
            margin: 10px;
            text-decoration: none; /* ✅ Removes underline */
            display: inline-block;
            font-weight: bold;
        }
        .btn-student {
            color: #00c3ff;
            border: 2px solid #00c3ff;
        }
        .btn-student:hover {
            background: #00c3ff;
            color: rgb(225, 220, 220);
        }
        .btn-officer {
            color: #ffcc00;
            border: 2px solid #ffcc00;
        }
        .btn-officer:hover {
            background: #ffcc00;
            color: black;
        }
        .btn-recruiter {
            color: #ff28bf;
            border: 2px solid #ff28bf;
        }
        .btn-recruiter:hover {
            background: #ff28bf;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid d-flex flex-column align-items-center">
                <!-- Logo -->
                <a class="navbar-brand mb-2" href="#">
                    <img src="{{ asset('images/final.webp') }}" alt="Integratex Logo" width="80">
                </a>
        
                <!-- Centered Text -->
                
            </div>
        </nav>
        <h2 class="mb-4">Select Login Type</h2>
        <a href="{{ route('officerlogin') }}" class="btn btn-custom btn-officer">Officer Login</a>
        <a href="{{ route('login') }}" class="btn btn-custom btn-student">Student Login</a>
        <a href="{{ route('recruiter.login') }}" class="btn btn-custom btn-recruiter">Recruiter Login</a>
    </div>
</body>
</html>
