<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomizePageResource\Pages;
use App\Filament\Resources\CustomizePageResource\RelationManagers;
use App\Models\CustomizePage;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;

class CustomizePageResource extends Resource
{
    protected static ?string $model = CustomizePage::class;
    protected static ?string $navigationLabel = 'Customize';
    protected static ?string $label = 'Customize';
    protected static ?string $navigationGroup = 'Page';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(6)
                    ->schema([
                        Card::make()->columnSpan(4)
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('key')->required(),
                                TextInput::make('value')->required(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function canDeleteAny(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomizePages::route('/'),
            // 'create' => Pages\CreateCustomizePage::route('/create'),
            'edit' => Pages\EditCustomizePage::route('/{record}/edit'),
        ];
    }
}
