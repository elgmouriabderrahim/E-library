<div class="min-h-[80vh] p-8 bg-slate-100">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-slate-800">Books</h2>
        <p class="text-slate-500 text-sm">Browse and manage your borrowed books</p>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow p-4">
        <?php if (!empty($books)): ?>
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <?php foreach ($books as $book): ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-slate-800 font-medium"><?= htmlspecialchars($book['title']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600"><?= htmlspecialchars($book['author']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600"><?= $book['year'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?= $book['status'] === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                                    <?= ucfirst($book['status']) ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <?php if($book['status'] === "available"): ?>
                                    <a href="/books/borrow?id=<?= $book['id'] ?>" class="text-blue-600 hover:underline">Borrow</a>
                                <?php elseif(isMyBorrow($myBorrows, $book['id'])): ?>
                                    <a href="/books/return?id=<?= $book['id'] ?>" class="text-yellow-600 hover:underline">Return</a>
                                <?php endif; ?>

                                <a href="/books/show?id=<?= $book['id'] ?>" class="text-gray-600 hover:underline">View Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="text-center p-10 text-slate-500">
                No books available at the moment.
            </div>
        <?php endif; ?>
    </div>

</div>
