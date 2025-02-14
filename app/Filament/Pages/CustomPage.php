<?php

namespace App\Filament\Pages;

use App\Mason\BrickCollection;
use Awcodes\Mason\Mason;
use Awcodes\Mason\Support\Faker;
use Filament\Forms\Form;
use Filament\Pages\Page;
use JetBrains\PhpStorm\NoReturn;

class CustomPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.custom-page';

    public ?array $data = null;

    public function mount(): void
    {
        $this->form->fill([
            'content' => Faker::make()
                ->brick(
                    identifier: 'section',
                    path: 'mason::bricks.section',
                    values: [
                        'background_color' => 'white',
                        'image_position' => 'start',
                        'image_alignment' => 'top',
                        'image_flush' => false,
                        'image_rounded' => true,
                        'image_shadow' => true,
                        'text' => '<h2>Heading 2</h2><p>Just some random text for a paragraph</p>',
                        'image' => null,
                        'actions' => [],
                        'actions_alignment' => null,
                    ]
                )
                ->asJson(),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->statePath('data')
            ->schema([
                Mason::make('content')
                    ->placeholder('Drag and drop bricks to get started...')
                    ->bricks(BrickCollection::make()),
            ]);
    }

    #[NoReturn]
    public function save(): void
    {
        dd($this->form->getState());
    }
}
