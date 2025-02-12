<?php

namespace App\Mason;

use Awcodes\Mason\Brick;
use Awcodes\Mason\EditorCommand;
use Awcodes\Mason\Mason;
use Awcodes\Mason\Support\Helpers;
use Filament\Forms\Components\TextInput;

class NewsletterSignup
{
    public static function make(): Brick
    {
        return Brick::make('newsletter_signup')
            ->label('Newsletter Signup')
            ->modalHeading('Newsletter Signup Settings')
            ->icon('heroicon-o-newspaper')
            ->slideOver()
            ->fillForm(fn (array $arguments): array => [
                'heading' => $arguments['heading'] ?? 'Want product news and updates? Sign up for our newsletter.',
            ])
            ->form([
                TextInput::make('heading')
                    ->label('Heading')
                    ->required(),
            ])
            ->action(function (array $arguments, array $data, Mason $component) {
                $component->runCommands(
                    [
                        new EditorCommand(
                            name: 'setBrick',
                            arguments: [[
                                'identifier' => 'newsletter_signup',
                                'path' => 'mason.newsletter-signup',
                                'values' => [
                                    'heading' => $data['heading'],
                                ],
                                'view' => view('mason.newsletter-signup', $data)->toHtml(),
                            ]],
                        ),
                    ],
                    editorSelection: $arguments['editorSelection'],
                );
            });
    }
}
