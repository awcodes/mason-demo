<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Login;
use Exception;
use Filament\FontProviders\LocalFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    /**
     * @throws Exception
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id(id: 'admin')
            ->path(path: 'admin')
            ->login(action: Login::class)
            ->colors([
                'primary' => Color::Lime,
                'gray' => Color::Slate,
            ])
            ->favicon(asset('favicon.svg'))
            ->viteTheme(theme: 'resources/css/filament/admin/theme.css')
            ->renderHook(
                name: PanelsRenderHook::STYLES_BEFORE,
                hook: fn (): string => Blade::render('components.fonts')
            )
            ->sidebarWidth('17rem')
            ->sidebarCollapsibleOnDesktop()
            ->font(family: 'Inter', provider: LocalFontProvider::class)
            ->homeUrl('/')
            ->discoverResources(in: app_path(path: 'Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path(path: 'Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path(path: 'Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
