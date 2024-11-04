<?php

namespace App\Filament\Resources\ApiManagementResource\Pages;

use App\Filament\Resources\ApiManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApiManagement extends ListRecords
{
    protected static string $resource = ApiManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
