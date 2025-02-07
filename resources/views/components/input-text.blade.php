{{-- <h5 class="font-semibold text-lg dark:text-white-light mb-3">{{ $title }}</h5>
<form {{ $attributes }}>
    @csrf
    @method('{{ $method }}')
    <input type="text" class="form-input" name="{{ $name }}" autofocus />
    <button type="submit" class="btn btn-primary mt-6">{{ $buttonName }}</button>
</form> --}}


<h5 class="font-semibold text-lg dark:text-white-light mb-3">{{ $title }}</h5>

<form action="{{ $attributes->get('action') }}" method="POST" {{ $attributes->except(['method', 'action']) }}>
    @csrf
    @method($method)

    <input type="text" id="{{ $name }}" placeholder="{{ $label ?? 'Enter text' }}"
        class="form-input mt-1 block w-full" name="{{ $name }}" autofocus />

    <button type="submit" class="btn btn-primary mt-6">
        {{ $buttonName ?? 'Submit' }}
    </button>
</form>
