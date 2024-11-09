<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ApiTestingPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'API Testing';

    protected static string $view = 'filament.pages.api-testing-page';
}
