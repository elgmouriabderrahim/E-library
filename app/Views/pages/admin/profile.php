<h1 class="text-4xl font-bold mb-8 text-neutral-100 text-center">My Profile</h1>

<div class="max-w-3xl mx-auto bg-neutral-200 shadow-lg rounded-lg overflow-hidden">
    <div class="flex flex-col md:flex-row items-center p-6 md:p-10">
        <div class="flex-shrink-0 mb-6 md:mb-0 md:mr-8">
            <div class="w-32 h-32 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-4xl font-bold">
                <?= strtoupper(substr($user['firstName'],0,1) . substr($user['lastName'],0,1)) ?>
            </div>
        </div>

        <div class="flex-1">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">
                <?= htmlspecialchars($user['firstName'] . ' ' . $user['lastName']) ?>
            </h2>
            <p class="text-gray-600 mb-1"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p class="text-gray-600 mb-1"><strong>Role:</strong> 
                <span class="<?= $user['role'] === 'admin' ? 'text-red-600 font-semibold' : 'text-blue-600 font-semibold' ?>">
                    <?= ucfirst($user['role']) ?>
                </span>
            </p>
            <p class="text-gray-500 mt-4 text-sm">
                Member since: <?= date('F d, Y', strtotime($user['created_at'] ?? date('Y-m-d'))) ?>
            </p>
        </div>
    </div>
</div>
