<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

    <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center">Register</h2>

        @if(session('success'))
            <p class="text-green-500 text-center">{{ session('success') }}</p>
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

            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded-lg mt-4">Register</button>
        </form>

        <p class="mt-4 text-center">Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a></p>
    </div>

</body>
</html>
