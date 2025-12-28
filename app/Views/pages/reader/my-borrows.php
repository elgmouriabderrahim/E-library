<h1 class="text-2xl font-bold">My Borrows</h1>

<?php foreach ($borrows as $borrow): ?>
    <p><?= $borrow['book'] ?> - Borrowed: <?= $borrow['borrowDate'] ?></p>
<?php endforeach; ?>
