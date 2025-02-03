<?php

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions\DeleteAction;

use function Pest\Livewire\livewire;

it('returns a successful response', function () {
    $post = Post::factory()->create();

    $response = $this->get('/posts/' . $post->slug);

    $response->assertStatus(200);
});

it('can render list page', function () {
    $this->get(PostResource::getUrl('index'))->assertSuccessful();
});

it('can render create page', function () {
    $this->get(PostResource::getUrl('create'))->assertSuccessful();
});

it('can render edit page', function () {
    $this->get(PostResource::getUrl('edit', [
        'record' => Post::factory()->create(),
    ]))->assertSuccessful();
});

it('can list posts', function () {
    $posts = Post::factory()->count(10)->create();

    livewire(PostResource\Pages\ListPosts::class)
        ->assertCanSeeTableRecords($posts);
});

it('can create post', function () {
    $newData = Post::factory()->make();

    livewire(PostResource\Pages\CreatePost::class)
        ->fillForm([
            'content' => $newData->content,
            'slug' => $newData->slug,
            'title' => $newData->title,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(Post::class, [
        'content' => $newData->content,
        'slug' => $newData->slug,
        'title' => $newData->title,
    ]);
});

it('can validate input', function () {
    livewire(PostResource\Pages\CreatePost::class)
        ->fillForm([
            'title' => null,
        ])
        ->call('create')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can retrieve data', function () {
    $post = Post::factory()->create();

    livewire(PostResource\Pages\EditPost::class, [
        'record' => $post->getRouteKey(),
    ])
        ->assertFormSet([
            'content' => $post->content,
            'slug' => $post->slug,
            'title' => $post->title,
        ]);
});

it('can save', function () {
    $post = Post::factory()->create();
    $newData = Post::factory()->make();

    livewire(PostResource\Pages\EditPost::class, [
        'record' => $post->getRouteKey(),
    ])
        ->fillForm([
            'content' => $newData->content,
            'slug' => $newData->slug,
            'title' => $newData->title,
        ])
        ->call('save')
        ->assertHasNoFormErrors();

    expect($post->refresh())
        ->content->toBe($newData->content)
        ->slug->toBe($newData->slug)
        ->title->toBe($newData->title);
});

it('can validate edit input', function () {
    $post = Post::factory()->create();

    livewire(PostResource\Pages\EditPost::class, [
        'record' => $post->getRouteKey(),
    ])
        ->fillForm([
            'title' => null,
        ])
        ->call('save')
        ->assertHasFormErrors(['title' => 'required']);
});

it('can delete', function () {
    $post = Post::factory()->create();

    livewire(PostResource\Pages\EditPost::class, [
        'record' => $post->getRouteKey(),
    ])
        ->callAction(DeleteAction::class);

    $this->assertModelMissing($post);
});
