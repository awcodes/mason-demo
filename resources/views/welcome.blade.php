<x-layouts.app>
    {!!
        mason($post->content, \App\Mason\BrickCollection::make())->toHtml()
    !!}
</x-layouts.app>
