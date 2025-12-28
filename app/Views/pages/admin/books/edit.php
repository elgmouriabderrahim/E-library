<div class="min-h-[80vh] bg-slate-100 flex justify-center items-start p-10">

    <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white p-6 text-center">
            <h1 class="text-3xl font-bold tracking-tight">Edit Book</h1>
            <p class="text-blue-200 mt-1 text-lg"><?= htmlspecialchars($book['title']) ?></p>
        </div>

        <div class="p-8 space-y-6">

            <form method="POST" action="" class="space-y-5">

                <input type="hidden" name="book_id" value="<?= $book['id'] ?>">

                <div>
                    <label class="block text-slate-700 font-semibold mb-2" for="title">Title</label>
                    <input type="text" id="title" name="title" value="<?= htmlspecialchars($_POST['title']) ?>" class="w-full px-4 py-3 border border-slate-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <?php if(isset($errors['title'])):?>
                    <span class="text-red-500"><?= $errors['title']?></span>
                    <?php endif; ?>
                </div>

                <div>
                    <label class="block text-slate-700 font-semibold mb-2" for="author">Author</label>
                    <input type="text" id="author" name="author" value="<?= htmlspecialchars($_POST['author']) ?>" class="w-full px-4 py-3 border border-slate-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <?php if(isset($errors['author'])):?>
                    <span class="text-red-500"><?= $errors['author']?></span>
                <?php endif; ?>

                <div>
                    <label class="block text-slate-700 font-semibold mb-2" for="year">Year</label>
                    <input type="number" id="year" name="year" value="<?= htmlspecialchars($_POST['year']) ?>" class="w-full px-4 py-3 border border-slate-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <?php if(isset($errors['year'])):?>
                    <span class="text-red-500"><?= $errors['year']?></span>
                <?php endif; ?>


                <div class="text-center mt-6">
                    <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 hover:from-indigo-700 hover:to-blue-700 text-white px-8 py-2 rounded-2xl shadow-lg transition duration-300 font-semibold transform hover:-translate-y-1">
                        Save
                    </button>
                </div>

            </form>

        </div>

        <div class="p-6 text-center bg-slate-50 border-t border-slate-200">
            <a href="/admin/books" class="text-indigo-600 hover:text-blue-600 font-medium transition-colors duration-300">
                Back to Books
            </a>
        </div>

    </div>

</div>
