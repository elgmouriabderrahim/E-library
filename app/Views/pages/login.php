<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="/assets/build/output.css">
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/assets/images/login-bg.png');">

    <div class="w-full max-w-lg bg-white bg-opacity-80 p-8 rounded-lg shadow-lg space-y-6">
        <h1 class="text-3xl font-semibold text-gray-800 text-center">Welcome Back</h1>
        <p class="text-gray-600 text-center">Please enter your details to access your account.</p>

        <form method="POST" class="space-y-4">
            <?php if (isset($errors['login'])): ?>
                <div class="text-red-500 text-center"><?= $errors['login'] ?></div>
            <?php endif; ?>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input
                    type="email"
                    name="email"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="example@gmail.com"
                    value="<?= htmlspecialchars($_POST['email'] ?? "") ?>"
                >
                <?php if (isset($errors['email'])): ?>
                    <span class="text-red-500"><?= $errors['email'] ?></span>
                <?php endif; ?>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    name="password"
                    class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    placeholder="Enter your password"
                    value="<?= htmlspecialchars($_POST['password'] ?? "") ?>"
                >
                <?php if (isset($errors['password'])): ?>
                    <span class="text-red-500"><?= $errors['password'] ?></span>
                <?php endif; ?>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
            >
                Log In
            </button>
        </form>

        <p class="text-sm text-center mt-4 text-gray-600">
            Don't have an account? <a href="/register" class="text-blue-600 hover:underline">Register here</a>
        </p>
    </div>

</body>
</html>
