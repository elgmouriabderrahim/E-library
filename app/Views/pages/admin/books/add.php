<div class="min-h-[80vh] bg-slate-100 p-8 flex justify-center items-start">

    <div class="w-full max-w-xl bg-white rounded-3xl shadow-lg p-8 relative">

        <h2 class="text-3xl font-bold text-slate-800 mb-2 text-center">Add New Book</h2>
        <p class="text-slate-500 mb-6 text-center">Fill in the details to add a book to the library</p>

        <form action="" method="POST" class="space-y-6">
            <a href="/admin/books" class="p-2 text-red-400 absolute right-0 top-0 hover:text-red-500 cursor-pointer">
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700">Title</label>
                <input type="text" name="title" id="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']?>" class="mt-1 block w-full rounded-lg border border-slate-300 shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700">
                <?php if (isset($errors['title'])): ?>
                    <span class="text-red-500"><?= $errors['title'] ?></span>
                <?php endif; ?>
            </div>
            

            <div>
                <label for="author" class="block text-sm font-medium text-slate-700">Author</label>
                <input type="text" name="author" id="author" value="<?php if(isset($_POST['author'])) echo $_POST['author']?>" class="mt-1 block w-full rounded-lg border border-slate-300 shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700">
                <?php if (isset($errors['author'])): ?>
                    <span class="text-red-500"><?= $errors['author'] ?></span>
                <?php endif; ?>
            </div>

            <div>
                <label for="year" class="block text-sm font-medium text-slate-700">Year</label>
                <input type="number" name="year" id="year" value="<?php if(isset($_POST['year'])) echo $_POST['year']?>" class="mt-1 block w-full rounded-lg border border-slate-300 shadow-sm px-4 py-2 focus:ring-blue-500 focus:border-blue-500 text-slate-700">
                <?php if (isset($errors['year'])): ?>
                    <span class="text-red-500"><?= $errors['year'] ?></span>
                <?php endif; ?>
            </div>


            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700 transition font-semibold">
                    Add Book
                </button>
            </div>

        </form>

    </div>

</div>
