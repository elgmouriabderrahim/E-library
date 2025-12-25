<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container mx-auto p-6">
    <?php require __DIR__ . '/../pages/' . $view; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
