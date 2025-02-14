@props([
    'id' => null,
    'background_color' => 'white',
    'cards' => [],
])

<section
    @class([
        'font-body branded @container',
        match ($background_color) {
            'primary' => 'bg-primary-500 text-white',
            'secondary' => 'bg-secondary-500 text-white',
            'tertiary' => 'bg-tertiary-500 text-white',
            'accent' => 'bg-accent-500 text-gray-900',
            'gray' => 'bg-gray-100 text-gray-900',
            'white' => 'bg-white text-gray-900',
            default => $background_color,
        },
    ])
>
    <div class="mx-auto w-full max-w-5xl px-6 py-8 @3xl:py-12">
        @if ($cards)
            <ul class="grid w-full list-none gap-6 px-0 text-neutral-900 @xl:grid-cols-2 @3xl:grid-cols-3">
                @foreach ($cards as $card)
                    <li class="h-full">
                        <x-card color="white" class="h-full">
                            @if($card['heading'])
                                <x-slot name="heading">
                                    {{ $card['heading'] }}
                                </x-slot>
                            @endif

                            <div class="prose max-w-none prose-headings:font-display">
                                {!! $card['body'] !!}
                            </div>

                            @if($card['footer'])
                                <x-slot name="footer">
                                    {{ $card['footer'] }}
                                </x-slot>
                            @endif
                        </x-card>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</section>
