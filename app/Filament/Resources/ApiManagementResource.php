<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApiManagementResource\Pages;
use App\Filament\Resources\ApiManagementResource\RelationManagers;
use App\Models\ApiManagement;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ApiManagementResource extends Resource
{
    protected static ?string $model = ApiManagement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name'),
                Select::make('content_type')->options([
                    "application/json" => "application/json",
                    "multipart/form-data" => "multipart/form-data",
                ]),
                TextInput::make('url'),
                Select::make('method')->options([
                    "GET" => "GET",
                    "POST" => "POST",
                    "PUT" => "PUT",
                    "PATCH" => "PATCH",
                ]),
                Repeater::make('fields')
                    ->relationship()
                    ->schema([
                        TextInput::make('name')->required(),
                        Select::make('input_type')->options([
                            'TextInput' => 'Text',
                            'Select' => 'Select',
                            'Toggle' => 'Toggle'
                        ])
                            ->required(),
                        Select::make('value_type')->options([
                            'string' => 'String',
                            'number' => 'Number',
                            'json' => 'JSON'
                        ])
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name'),
                TextColumn::make('content_type'),
                TextColumn::make('url'),
                TextColumn::make('method'),
                TextColumn::make('name'),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApiManagement::route('/'),
            'create' => Pages\CreateApiManagement::route('/create'),
            'edit' => Pages\EditApiManagement::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        return auth()->user()->role == 'Admin';
    }
}
