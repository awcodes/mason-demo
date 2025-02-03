<div class="prose max-w-none dark:prose-invert">
    <h1>{{ $post->title }}</h1>
    {!! str()->markdown($post->content) !!}
</div>
