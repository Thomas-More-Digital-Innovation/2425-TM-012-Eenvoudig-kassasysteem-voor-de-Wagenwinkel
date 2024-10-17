@props([
    'color' => 'dark',
])

@php
    $userClass = $attributes->get('class') ?? '';
    $cursor = $attributes->get('disabled') ? ' cursor-not-allowed opacity-50 ' : ' cursor-pointer ';
    $userClass = $userClass . $cursor;
    $checkedBackground = [
        'dark' => 'peer-checked:bg-green-700',
        'success' => 'peer-checked:bg-green-200',
        'danger' => 'peer-checked:bg-red-200',
        'info' => 'peer-checked:bg-blue-200',
    ];
    $checkedBackground = $checkedBackground[$color] ?? $checkedBackground['dark'];
    $dotBackground = [
        'dark' => 'bg-gray-600 peer-checked:bg-green-300',
        'success' => 'bg-gray-600 peer-checked:bg-green-600',
        'danger' => 'bg-gray-600 peer-checked:bg-red-600',
        'info' => 'bg-gray-600 peer-checked:bg-blue-600',
    ];
    $dotBackground = $dotBackground[$color] ?? $dotBackground['dark'];
    $model =  $attributes->wire('model')->value();
    // Convert the checked prop to a boolean
    $isChecked = filter_var($checked, FILTER_VALIDATE_BOOLEAN);
@endphp

<label class="{{$userClass}} inline-flex items-center shadow-sm"
       @if($model)
           x-data="{ value: @entangle($model) }"
    @endif
>
    <div class="relative">
        <input type="checkbox" class="sr-only peer {{ $userClass }}"
            {{ $isChecked ? 'checked' : '' }}
            {{ $attributes->except(['checked','class']) }}>
        <div class="w-14 h-7 border border-gray-300 bg-gray-200 {{ $checkedBackground }} rounded-full transition-colors duration-300 ease-in-out"></div>
        <div class="absolute left-1 top-1 border border-gray-300 {{ $dotBackground }} size-5 rounded-full transition-transform duration-300 ease-in-out peer-checked:translate-x-7"></div>
    </div>
</label>
