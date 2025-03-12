<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100 overflow-auto">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center">Register</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong>Error!</strong> Please fix the following issues:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">First Name</label>
                    <input type="text" name="firstname" class="w-full p-2 border rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700">Last Name</label>
                    <input type="text" name="lastname" class="w-full p-2 border rounded-lg" required>
                </div>
            </div>
            
            <div class="mt-2">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">Role</label>
                <input type="text" name="role" class="w-full p-2 border rounded-lg">
            </div>

            <div class="grid grid-cols-2 gap-4 mt-2">
                <div>
                    <label class="block text-gray-700">Age</label>
                    <input type="number" name="age" class="w-full p-2 border rounded-lg">
                </div>
                <div>
                    <label class="block text-gray-700">Phone</label>
                    <input type="text" name="phone" class="w-full p-2 border rounded-lg">
                </div>
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">Address</label>
                <input type="text" name="address" class="w-full p-2 border rounded-lg">
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">GitHub User ID</label>
                <input type="text" name="githubuserid" class="w-full p-2 border rounded-lg">
            </div>

            <!-- Year Dropdown -->
            <div class="mt-2">
                <label class="block text-gray-700">Year</label>
                <select name="year" class="w-full p-2 border rounded-lg">
                    <option value="select" selected disabled>Select</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>
            </div>

            <!-- Branch Dropdown (Fetched from Database) -->
            <div class="mt-2">
                <label class="block text-gray-700">Branch</label>
                <select name="branch_id" class="w-full p-2 border rounded-lg" required>
                    <option value="" selected disabled>Select Branch</option>
                    @foreach($branches as $branch)
                        <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Placement Status Dropdown -->
            <div class="mt-2">
                <label class="block text-gray-700">Placement Status</label>
                <select name="placement_status" class="w-full p-2 border rounded-lg">
                    <option value="Not Placed">Not Placed</option>
                    <option value="Shortlisted">Shortlisted</option>
                    <option value="Placed">Placed</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg mt-4">Register</button>
        </form>

        <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
    </div>

</body>
</html>
