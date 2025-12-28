<div class=" p-8">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-neutral-100">Books Management</h2>
        <a href="/admin/books/add" class="border rounded-md py-1 px-3 bg-neutral-100 hover:bg-neutral-200 text-blue-600  shadow transition">
            + Add New Book
        </a>
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
                                <a href="/admin/books/show?id=<?= $book['id'] ?>" class="border rounded-md py-1 px-3 hover:bg-neutral-100 text-blue-600 ">View</a>
                                <a href="/admin/books/edit?id=<?= $book['id'] ?>" class="border rounded-md py-1 px-3 hover:bg-neutral-100 text-yellow-600">Edit</a>
                                <a href="/admin/books/delete?id=<?= $book['id'] ?>" class="border rounded-md py-1 px-3 hover:bg-neutral-100 text-red-600">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="text-center p-10 text-slate-500">
                No books found. <a href="/admin/books/add" class="text-blue-600 hover:underline">Add a new book</a>.
            </div>
        <?php endif; ?>
    </div>

</div>
