<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Category;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use App\Filament\Resources\CategoryResource\Pages;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use PhpParser\Node\Stmt\Label;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

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
                            ]),
                        Grid::make()->columnSpan(2)
                            ->schema([
                                Card::make()
                                    ->schema([
                                        Placeholder::make('Status'),
                                        Toggle::make('is_visible')
                                            ->label('Visible')
                                            ->helperText('This will be hidden from viewer'),
                                    ]),
                                Forms\Components\Card::make()
                                    ->schema([
                                        Forms\Components\Placeholder::make('created_at')
                                            ->label('Created at')
                                            ->content(fn (?Category $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                        Forms\Components\Placeholder::make('updated_at')
                                            ->label('Last modified at')
                                            ->content(fn (?Category $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\BooleanColumn::make('is_visible')->label('Visible')
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
