<div>
    {{-- The best athlete wants his opponent at his best. --}}
    @if (!empty($apis))
        @foreach ($apis as $api)
            <div wire:key="{{ $api->id }}">
                <div>
                    {{ $api->name }}
                </div>
                <div>
                    <div class="flex justify-between">
                        <h2 class="ml-2">{{ $api->url }}</h2>
                        <h2 class="ml-2">{{ $api->method }}</h2>
                    </div>
                    <h3>Fields</h3>
                    <livewire:form-generator :fields="$api->fields" :id="$api->id">
                </div>
            </div>
        @endforeach
    @endif
</div>
