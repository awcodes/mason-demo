<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('liveView')
                ->label('View')
                ->url(fn ($record) => route('posts.show', $record), shouldOpenInNewTab: true),
            Actions\DeleteAction::make(),
        ];
    }
}
