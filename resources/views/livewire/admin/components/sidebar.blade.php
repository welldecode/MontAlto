<div class="w-full md:w-[220px] me-10 border-r border-zinc-700 pr-5 h-screen pt-6">
    <flux:navlist>
        @foreach ($items as $item)
            @if (isset($item['modal']))
                <flux:modal.trigger name="{{ $item['modal'] }}">
                    <flux:navlist.item href="#" label="{{ $item['label'] }}" />
                </flux:modal.trigger>
            @else
           <flux:navlist.item href="{{ $item['route'] }}">{{ $item['label'] }}</flux:navlist.item>
            @endif
        @endforeach
    </flux:navlist>
</div>