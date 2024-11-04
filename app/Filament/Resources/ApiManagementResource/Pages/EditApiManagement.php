<?php

namespace App\Filament\Resources\ApiManagementResource\Pages;

use App\Filament\Resources\ApiManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApiManagement extends EditRecord
{
    protected static string $resource = ApiManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
