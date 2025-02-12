<div class="prose max-w-none dark:prose-invert">
{{--    @mason($post->content)--}}
    {!!
        mason($post->content, [
            \App\Mason\Batman::make(),
            \App\Mason\NewsletterSignup::make(),
            \Awcodes\Mason\Actions\Section::make(),
        ])->toHtml()
    !!}
</div>
