<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="/assets/build/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100">

<?php require __DIR__ . '/../partials/header.php'; ?>

<main class="container mx-auto p-6 min-h-[80vh]">
    <?php require __DIR__ . '/../pages/' . $view; ?>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>
