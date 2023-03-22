<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrustedBrandResource\Pages;
use App\Filament\Resources\TrustedBrandResource\RelationManagers;
use App\Models\TrustedBrand;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class TrustedBrandResource extends Resource
{
    protected static ?string $model = TrustedBrand::class;

    protected static ?string $label = 'Global Brands';
    protected static ?string $navigationIcon = 'heroicon-o-star';
    protected static ?string $navigationGroup = 'Items';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(6)
                    ->schema([
                        Card::make()->columnSpan(4)
                            ->schema([
                                TextInput::make('name')->required(),
                                SpatieMediaLibraryFileUpload::make('image')
                                    ->collection('image')
                                    ->required()
                                    ->imagePreviewHeight('200')
                                    ->panelLayout('compact')
                                    ->maxSize(1024),
                            ]),
                        Grid::make()->columnSpan(2)
                            ->schema([
                                Card::make()->columnSpan(2)
                                    ->schema([
                                        Placeholder::make('Status'),
                                        Toggle::make('is_visible')
                                            ->default(true)
                                            ->label('Visible')
                                            ->helperText('This will be hidden from viewer'),
                                    ]),
                                Forms\Components\Card::make()
                                    ->schema([
                                        Forms\Components\Placeholder::make('created_at')
                                            ->label('Created at')
                                            ->content(fn (?TrustedBrand $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                        Forms\Components\Placeholder::make('updated_at')
                                            ->label('Last modified at')
                                            ->content(fn (?TrustedBrand $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                                    ])
                            ])
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                SpatieMediaLibraryImageColumn::make('image')->collection('image'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                BooleanColumn::make('is_visible')->label('Visible')
                    ->trueColor('primary')
                    ->falseColor('warning')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrustedBrands::route('/'),
            'create' => Pages\CreateTrustedBrand::route('/create'),
            'edit' => Pages\EditTrustedBrand::route('/{record}/edit'),
        ];
    }
}
