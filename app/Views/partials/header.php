<header class="bg-blue-600 text-white py-4">
    <div class="container mx-auto flex justify-between">
        <a href="/" class="font-bold text-xl">E-Library</a>
        <nav>
            <?php if($_SESSION['role']  === "admin"):?>
            <a href="/admin/overview" class="px-3 hover:underline">overview</a>
            <?php endif ?>

            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/books" class="px-3 hover:underline">Books</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/users" class="px-3 hover:underline">users</a>
            <?php endif ?>

            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/borrows" class="px-3 hover:underline">borrows</a>
                <?php endif ?>
                
                
                <?php if($_SESSION['role']  === "admin"):?>
                    <a href="/admin/dashboard" class="px-3 hover:underline">Dashboard</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/profile" class="px-3 hover:underline">profile</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "reader"):?>
                <a href="/books" class="px-3 hover:underline">Books</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "reader"):?>
            <a href="/my-borrows" class="px-3 hover:underline">My Borrows</a>
            <?php endif ?>
            
            
            <?php if($_SESSION['role']  === "reader"):?>
                <a href="/profile" class="px-3 hover:underline">profile</a>
            <?php endif ?>
            <a href="/logout" class="px-3 hover:underline">logout</a>
        </nav>
    </div>
</header>
