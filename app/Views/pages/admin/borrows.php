<h1 class="text-3xl font-bold mb-6">Borrows Management</h1>

<div class="bg-white shadow rounded overflow-x-auto">
    <table class="min-w-full border-collapse">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2 text-left">ID</th>
                <th class="border px-4 py-2 text-left">Reader</th>
                <th class="border px-4 py-2 text-left">Book</th>
                <th class="border px-4 py-2 text-left">Borrow Date</th>
                <th class="border px-4 py-2 text-left">Return Date</th>
                <th class="border px-4 py-2 text-left">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($borrows)): ?>
                <tr>
                    <td colspan="6" class="text-center py-6 text-gray-500">
                        No borrows found.
                    </td>
                </tr>
            <?php else: ?>
                <?php foreach ($borrows as $borrow): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2"><?= htmlspecialchars($borrow['id']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($borrow['readerName']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($borrow['bookTitle']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($borrow['borrowDate']) ?></td>
                        <td class="border px-4 py-2">
                            <?= $borrow['returnDate'] ? htmlspecialchars($borrow['returnDate']) : '-' ?>
                        </td>
                        <td class="border px-4 py-2 font-semibold">
                            <?php if ($borrow['returnDate'] === null): ?>
                                <span class="text-red-600">Active</span>
                            <?php else: ?>
                                <span class="text-green-600">Returned</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
