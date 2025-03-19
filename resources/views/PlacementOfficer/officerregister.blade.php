<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center">Officer Registration</h2>

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

        <form action="{{ route('officerregister.post') }}" method="POST">
            @csrf
            <div class="mt-2">
                <div>
                    <label class="block text-gray-700">Officer Name</label>
                    <input type="text" name="officer_name" class="w-full p-2 border rounded-lg" required>
                </div>
            </div>
            
            <div class="mt-2">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">Phone</label>
                <input type="text" name="phone" class="w-full p-2 border rounded-lg" required>
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">Role</label>
                <input type="text" name="role" class="w-full p-2 border rounded-lg">
            </div>

            <div class="mt-2">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded-lg" required>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg mt-4">Register</button>
        </form>

        <p class="mt-4 text-center">Already have an account? <a href="{{ route('officerlogin') }}" class="text-blue-500">Login</a></p>
    </div>

</body>
</html>
