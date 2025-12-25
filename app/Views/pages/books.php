<h2 class="text-xl font-bold mb-4">Books</h2>

<?php foreach ($books as $book): ?>
    <div class="bg-white p-4 mb-2 rounded shadow">
        <h3><?= $book['title'] ?></h3>
        <p><?= $book['author'] ?></p>
        <a class="text-blue-600" href="/books/show">View</a>
    </div>
<?php endforeach; ?>
