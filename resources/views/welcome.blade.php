<x-layouts.app>
    {!!
        mason($post->content, [
            \App\Mason\Batman::make(),
            \App\Mason\NewsletterSignup::make(),
            \Awcodes\Mason\Actions\Section::make(),
        ])->toHtml()
    !!}
</x-layouts.app>
