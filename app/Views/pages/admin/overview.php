<div class="p-8">

    <div class="mb-10 text-center">
        <h1 class="text-3xl font-semibold text-white">Overview</h1>
        <p class="text-white mt-2">Library statistics summary</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-200 flex flex-col items-center justify-center">
            <p class="text-sm text-slate-400 uppercase tracking-wide">Total Users</p>
            <h2 class="text-4xl font-bold text-slate-800 mt-3"><?= $total['users'] ?? 0 ?></h2>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-200 flex flex-col items-center justify-center">
            <p class="text-sm text-slate-400 uppercase tracking-wide">Total Books</p>
            <h2 class="text-4xl font-bold text-slate-800 mt-3"><?= $total['books'] ?? 0 ?></h2>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-200 flex flex-col items-center justify-center">
            <p class="text-sm text-slate-400 uppercase tracking-wide">Active Borrows</p>
            <h2 class="text-4xl font-bold text-slate-800 mt-3"><?= $total['activeBorrows'] ?? 0 ?></h2>
        </div>

        <div class="bg-white rounded-3xl shadow-lg p-6 border border-slate-200 flex flex-col items-center justify-center">
            <p class="text-sm text-slate-400 uppercase tracking-wide">Returned Books</p>
            <h2 class="text-4xl font-bold text-slate-800 mt-3"><?= $total['returnedBorrows'] ?? 0 ?></h2>
        </div>

    </div>
</div>
