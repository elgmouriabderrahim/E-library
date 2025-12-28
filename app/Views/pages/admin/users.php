<div class="min-h-[80vh] bg-slate-100 p-8">

    <div class="mb-8">
        <h1 class="text-3xl font-semibold text-slate-800">Users Management</h1>
        <p class="text-slate-500 mt-1">Manage all registered users</p>
    </div>

    <div class="bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">

        <table class="w-full">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr class="text-sm text-slate-500 uppercase tracking-wide">
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">User</th>
                    <th class="px-6 py-4 text-left">Email</th>
                    <th class="px-6 py-4 text-left">Role</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">

                <?php if (empty($users)): ?>
                <tr>
                    <td colspan="5" class="py-10 text-center text-slate-500">
                        No users found.
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach ($users as $user): ?>
                <tr class="hover:bg-slate-50 transition">

                    <td class="px-6 py-4 text-slate-600">
                        #<?= htmlspecialchars($user['id']) ?>
                    </td>

                    <td class="px-6 py-4">
                        <div class="font-medium text-slate-800">
                            <?= htmlspecialchars($user['firstName']) ?>
                            <?= htmlspecialchars($user['lastName']) ?>
                        </div>
                    </td>

                    <td class="px-6 py-4 text-slate-600">
                        <?= htmlspecialchars($user['email']) ?>
                    </td>

                    <td class="px-6 py-4">
                        <?php if ($user['role'] === 'admin'): ?>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                            Admin
                        </span>
                        <?php else: ?>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-700">
                            Reader
                        </span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>

            </tbody>
        </table>
    </div>
</div>