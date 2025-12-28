<div class="min-h-[80vh] p-8 bg-slate-100">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-slate-800">My Borrows</h2>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow p-4">
        <?php if (!empty($myBorrows)): ?>
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Book</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Author</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Year</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Borrow Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Return Date</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    <?php foreach ($myBorrows as $borrow): ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-slate-800 font-medium"><?= htmlspecialchars($borrow['title']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600"><?= htmlspecialchars($borrow['author']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600"><?= htmlspecialchars($borrow['year']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600"><?= htmlspecialchars($borrow['borrowDate']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-slate-600">
                                <?= $borrow['returnDate'] ? htmlspecialchars($borrow['returnDate']) : '—' ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <?php if (!$borrow['returnDate']): ?>
                                    <a href="/books/returnBook?id=<?= $borrow['bookId'] ?>&redirect=/my-borrows" class="border rounded-md py-1 px-3 hover:bg-neutral-100 text-yellow-600">Return Book</a>
                                <?php else: ?>
                                    <span class="text-green-600 font-semibold">Returned</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="text-center p-10 text-slate-500">
                You have not borrowed any books yet.
            </div>
        <?php endif; ?>
    </div>

</div>
