// resources/views/components/tmk/livewire-log.blade.php

<div>
    <h2 class="text-2xl font-bold mb-4">Livewire Log</h2>
    <pre>
        {{ json_encode($products, JSON_PRETTY_PRINT) }}
    </pre>
    <pre>
        {{ json_encode($organisaties, JSON_PRETTY_PRINT) }}
    </pre>
</div>

@push('scripts')
    <script>
        console.log('Livewire Log:');
        console.log({!! json_encode($products) !!});
        console.log({!! json_encode($organisaties) !!});
    </script>
@endpush
