<div>
    <label>
        {{ $label }}
        <input
            type="{{ $type }}"
            name="{{ $name }}">

        @if(!empty($error))
            <p class="text-danger">{{ $error }}</p>
        @endif
    </label>
</div>
