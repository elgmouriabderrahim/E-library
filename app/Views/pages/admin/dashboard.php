<h1 class="text-4xl font-bold mb-8 text-gray-800">Admin Dashboard</h1>

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

    <!-- Total Users -->
    <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm">Total Users</p>
            <p class="text-3xl font-bold text-gray-800"><?= $stats['users'] ?></p>
        </div>
        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-bold">
            👤
        </div>
    </div>

    <!-- Total Books -->
    <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm">Total Books</p>
            <p class="text-3xl font-bold text-gray-800"><?= $stats['books'] ?></p>
        </div>
        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-xl font-bold">
            📚
        </div>
    </div>

    <!-- Active Borrows -->
    <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm">Active Borrows</p>
            <p class="text-3xl font-bold text-gray-800"><?= $stats['activeBorrows'] ?></p>
        </div>
        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-full flex items-center justify-center text-xl font-bold">
            ⏳
        </div>
    </div>

    <!-- Returned Borrows -->
    <div class="bg-white rounded-xl shadow p-6 flex items-center justify-between">
        <div>
            <p class="text-gray-500 text-sm">Returned</p>
            <p class="text-3xl font-bold text-gray-800"><?= $stats['returnedBorrows'] ?></p>
        </div>
        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-xl font-bold">
            ✅
        </div>
    </div>

</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-semibold mb-4 text-gray-800">Management</h2>
        <div class="flex flex-col gap-3">
            <a href="/admin/books" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Manage Books
            </a>
            <a href="/admin/users" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 transition">
                View Users
            </a>
            <a href="/admin/borrows" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                View Borrows
            </a>
        </div>
    </div>

    <!-- System Info / Placeholder -->
    <div class="bg-white rounded-xl shadow p-6 flex flex-col justify-center items-center text-center">
        <p class="text-gray-500 mb-2">System Status</p>
        <p class="text-2xl font-bold text-green-600">All systems operational</p>
        <p class="text-sm text-gray-400 mt-2">Library running smoothly</p>
    </div>

</div>
