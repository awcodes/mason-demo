<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use Filament\Pages\Page;
use JetBrains\PhpStorm\NoReturn;

class CustomPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.custom-page';

    public ?array $data = null;

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                //
            ]);
    }

    #[NoReturn]
    public function save(): void
    {
        dd($this->form->getState());
    }
}
