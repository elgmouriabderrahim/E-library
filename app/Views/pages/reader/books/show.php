<div class="min-h-[80vh] p-10 flex justify-center items-start">

    <div class="w-full max-w-2xl bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 text-center">
            <h1 class="text-4xl font-bold tracking-tight"><?= htmlspecialchars($book['title']) ?></h1>
            <p class="text-blue-200 mt-1 text-lg">Book Details</p>
        </div>

        <div class="p-8 space-y-6">

            <div class="flex justify-between border-b border-slate-200 pb-3">
                <span class="font-semibold text-slate-700">Author</span>
                <span class="text-slate-800"><?= htmlspecialchars($book['author']) ?></span>
            </div>

            <div class="flex justify-between border-b border-slate-200 pb-3">
                <span class="font-semibold text-slate-700">Year</span>
                <span class="text-slate-800"><?= htmlspecialchars($book['year']) ?></span>
            </div>

            <div class="flex justify-between border-b border-slate-200 pb-3">
                <span class="font-semibold text-slate-700">Status</span>
                <?php if ($book['status'] === 'available'): ?>
                    <span class="text-green-600 font-semibold">Available</span>
                <?php else: ?>
                    <span class="text-red-600 font-semibold">Borrowed</span>
                <?php endif; ?>
            </div>

            <?php if ($book['status'] === 'available'): ?>
                <form method="POST" action="/borrows/store" class="mt-6 flex justify-center">
                    <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                    <button type="submit"
                        class="bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-3 rounded-2xl shadow-lg transition duration-300 font-semibold transform hover:-translate-y-1">
                        Borrow this Book
                    </button>
                </form>
            <?php else: ?>

                <?php if (!empty($canReturn) && $canReturn === true): ?>
                    <form method="POST" action="/borrows/return">
                        <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                        <button class="bg-green-600 text-white px-4 py-2 rounded">
                            Return this book
                        </button>
                    </form>
                <?php endif; ?>

            <?php endif; ?>

        </div>

        <div class="p-6 text-center bg-slate-50 border-t border-slate-200">
            <a href="/admin/books" class="text-blue-600 hover:text-indigo-600 font-medium transition-colors duration-300">
                Back to Books
            </a>
        </div>

    </div>

</div>
