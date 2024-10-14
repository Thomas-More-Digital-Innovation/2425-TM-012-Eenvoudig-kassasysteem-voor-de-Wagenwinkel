<x-header header="Members">
    <?php foreach ($users as $user): ?>
    <div class="bg-white p-4 rounded-lg flex items-center justify-between mb-3">
        <span>{{ $user->naam }}</span>
    </div>
    <?php endforeach; ?>
</x-header>
