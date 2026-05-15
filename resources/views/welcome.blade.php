
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-xl p-10 w-full max-w-md text-center">

        <h1 class="text-3xl font-bold text-blue-900 mb-3">
            Student Management System
        </h1>

        <p class="text-gray-600 mb-8">
            Welcome To Get Access Please Enter Your Details
        </p>

        @if (Route::has('login'))
            <div class="space-y-4">

                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="block w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition">
                        Dashboard
                    </a>
                @else

                    <a href="{{ route('login') }}"
                       class="block w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-800 transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="block w-full bg-gray-800 text-white py-3 rounded-lg hover:bg-black transition">
                        Register
                    </a>

                @endauth

            </div>
        @endif

        <div class="mt-8 text-sm text-gray-500">
            Powered by Shivam Yadav
        </div>

    </div>

</body>
</html>
