<div>
{{--    @mason($post->content)--}}
    {!!
        mason($post->content, \App\Mason\BrickCollection::make())->toHtml()
    !!}
</div>
