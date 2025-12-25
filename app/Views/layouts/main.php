<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="http://localhost/assets/build/output.css">
</head>
<body class="bg-gray-100">

<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container mx-auto p-6">
    <?php require __DIR__ . '/../pages/' . $view; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
