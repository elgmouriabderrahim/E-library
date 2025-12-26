<header class="bg-blue-600 text-white py-4">
    <div class="container mx-auto flex justify-between">
        <a href="/" class="font-bold text-xl">E-Library</a>
        <nav>
            <a href="/" class="px-3 hover:underline">Home</a>
            <a href="/books" class="px-3 hover:underline">Books</a>
            <a href="/my-borrows" class="px-3 hover:underline">My Borrows</a>
            <?php if($_SESSION['role']  === "admin"):?>
            <a href="/admin" class="px-3 hover:underline">Admin</a>
            <?php endif ?>
            <a href="/logout" class="px-3 hover:underline">logout</a>
        </nav>
    </div>
</header>
