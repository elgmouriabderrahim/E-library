<div class="p-8">

    <div class="flex justify-center text-center items-center mb-6 ">
        <div>
            <h2 class="text-3xl font-bold text-neutral-100">Borrows Management</h2>
            <p class="text-neutral-100 mt-1">All borrowing activity</p>
        </div>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow p-4">

        <?php if (!empty($borrows)): ?>

            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Book</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Reader</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Borrow Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Return Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-slate-200">

                    <?php foreach ($borrows as $borrow): ?>

                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 text-slate-600">
                                #<?= htmlspecialchars($borrow['id']) ?>
                            </td>

                            <td class="px-6 py-4 font-medium text-slate-800">
                                <?= htmlspecialchars($borrow['book_title']) ?>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                <?= htmlspecialchars($borrow['firstName']) ?>
                                <?= htmlspecialchars($borrow['lastName']) ?>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                <?= htmlspecialchars($borrow['borrowDate']) ?>
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                <?= $borrow['returnDate'] ? htmlspecialchars($borrow['returnDate']) : '—' ?>
                            </td>

                            <td class="px-6 py-4">
                                <?php if ($borrow['returnDate'] === null): ?>
                                    <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        Active
                                    </span>
                                <?php else: ?>
                                    <span class="px-2 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Returned
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        <?php else: ?>

            <div class="text-center p-10 text-slate-500">
                No borrows found.
            </div>

        <?php endif; ?>

    </div>

</div>
