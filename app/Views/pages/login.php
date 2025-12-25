<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-screen bg-cover bg-center" style="background-image: url('/assets/images/login-bg.png');">

    <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
        <form class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md space-y-6">
            <div class="text-center">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">Welcome back</h2>
                <p class="text-gray-600 mb-6">Please enter your details to access your account.</p>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email or Username</label>
                <input id="email" type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="example@gmail.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" placeholder="Enter your password">
            </div>

            <div class="flex justify-between items-center">
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">Sign In</button>
            </div>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">Don't have an account? <a href="/register" class="text-blue-600 hover:underline">Register here</a></p>
            </div>
        </form>
    </div>

</body>
</html>
