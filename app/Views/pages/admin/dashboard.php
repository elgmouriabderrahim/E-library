<div class="min-h-[80vh] p-8 bg-slate-100">

    <div class="mb-8 w-full text-center">
        <h1 class="text-3xl font-bold text-slate-800">Dashboard</h1>
        <p class="text-slate-500 mt-1">Overview of your library system</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-10">

        <div class="bg-white rounded-2xl shadow p-6 border border-slate-200">
            <p class="text-sm text-slate-500">Total Users</p>
            <h2 class="text-3xl font-bold text-slate-800 mt-2">
                <?= $stats['users'] ?? 0 ?>
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border border-slate-200">
            <p class="text-sm text-slate-500">Total Books</p>
            <h2 class="text-3xl font-bold text-slate-800 mt-2">
                <?= $stats['books'] ?? 0 ?>
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border border-slate-200">
            <p class="text-sm text-slate-500">Active Borrows</p>
            <h2 class="text-3xl font-bold text-red-600 mt-2">
                <?= $stats['activeBorrows'] ?? 0 ?>
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border border-slate-200">
            <p class="text-sm text-slate-500">Returned Books</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">
                <?= $stats['returnedBorrows'] ?? 0 ?>
            </h2>
        </div>

    </div>

    <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-slate-800">Recent Borrows</h2>
            <a href="/admin/borrows" class="text-blue-600 text-sm hover:underline">
                View all
            </a>
        </div>

        <?php if (!empty($recentBorrows)): ?>

            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Book</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Reader</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Borrow Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Status</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    <?php foreach ($recentBorrows as $borrow): ?>
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-4 py-3 font-medium text-slate-800">
                                <?= htmlspecialchars($borrow['book_title']) ?>
                            </td>
                            <td class="px-4 py-3 text-slate-600">
                                <?= htmlspecialchars($borrow['firstName']) ?>
                                <?= htmlspecialchars($borrow['lastName']) ?>
                            </td>
                            <td class="px-4 py-3 text-slate-600">
                                <?= htmlspecialchars($borrow['borrowDate']) ?>
                            </td>
                            <td class="px-4 py-3">
                                <?php if ($borrow['returnDate'] === null): ?>
                                    <span class="px-2 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                        Active
                                    </span>
                                <?php else: ?>
                                    <span class="px-2 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                        Returned
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php else: ?>

            <div class="text-center py-10 text-slate-500">
                No recent borrows.
            </div>

        <?php endif; ?>

    </div>

</div>
