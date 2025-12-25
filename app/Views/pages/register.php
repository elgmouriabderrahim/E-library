<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/assets/images/login-bg.png');">

    <div class="w-full max-w-lg bg-white bg-opacity-80 p-8 rounded-lg shadow-lg space-y-6">
        <h1 class="text-3xl font-semibold text-gray-800 text-center">Join the Library</h1>
        <p class="text-gray-600 text-center">Manage your books, loans, and reservations easily.</p>

        <form method="post" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">First Name</label>
                <input
                    type="text"
                    name="firstName"
                    required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="enter your firstname"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Last Name</label>
                <input
                    type="text"
                    name="lastName"
                    required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="enter yout lastname"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input
                    type="email"
                    name="email"
                    required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="example@gmail.com"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Create a strong password"
                >
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    type="password"
                    name="confirmPassword"
                    required
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Confirm your password"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
            >
                Create Account
            </button>
        </form>

        <p class="text-sm text-center mt-4 text-gray-600">
            Already have an account? <a href="/login" class="text-blue-600 hover:underline">Log In</a>
        </p>
    </div>

</body>
</html>
