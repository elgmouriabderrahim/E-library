<header class="bg-neutral-900 text-neutral-100 py-4 fixed w-full top-0">
    <div class="container mx-auto flex justify-between">
        <a href="/" class="font-bold text-xl">E-Library</a>
        <nav>
            <?php $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); ?>
            <?php if($_SESSION['role']  === "admin"):?>
            <a href="/admin/overview" class="px-3 hover:underline <?php if($uri==="/admin/overview") echo"underline"?>">overview</a>
            <?php endif ?>

            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/books" class="px-3 hover:underline <?php if($uri==="/admin/books") echo"underline"?>">Books</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/users" class="px-3 hover:underline <?php if($uri==="/admin/users") echo"underline"?>">users</a>
            <?php endif ?>

            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/borrows" class="px-3 hover:underline <?php if($uri==="/admin/borrows") echo"underline"?>">borrows</a>
                <?php endif ?>
                
                
                <?php if($_SESSION['role']  === "admin"):?>
                    <a href="/admin/dashboard" class="px-3 hover:underline <?php if($uri==="/admin/dashboard") echo"underline"?>">Dashboard</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "admin"):?>
                <a href="/admin/profile" class="px-3 hover:underline <?php if($uri==="/admin/profile") echo"underline"?>">profile</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "reader"):?>
                <a href="/books" class="px-3 hover:underline <?php if($uri==="/books") echo"underline"?>">Books</a>
            <?php endif ?>
            
            <?php if($_SESSION['role']  === "reader"):?>
            <a href="/my-borrows" class="px-3 hover:underline <?php if($uri==="/my-borrows") echo"underline"?>">My Borrows</a>
            <?php endif ?>
            
            
            <?php if($_SESSION['role']  === "reader"):?>
                <a href="/profile" class="px-3 hover:underline <?php if($uri==="/profile") echo"underline"?>">profile</a>
            <?php endif ?>
            <a href="/logout" class="px-3 hover:underline">logout</a>
        </nav>
    </div>
</header>
