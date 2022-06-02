<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\DesignCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use App\Filament\Resources\DesignCategoryResource\Pages;
use App\Filament\Resources\DesignCategoryResource\RelationManagers;
use App\Tables\Columns\Color;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\ImageColumn;

class DesignCategoryResource extends Resource
{
    protected static ?string $model = DesignCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(6)
                    ->schema([
                        Card::make()->columnSpan(4)
                            ->schema([
                                TextInput::make('name')->required(),
                                TextInput::make('desc')->label('Description')->required(),
                                ColorPicker::make('color')->required(),
                                FileUpload::make('image')->image()
                                        ->maxSize(1024)
                                        ->imageCropAspectRatio('1:1')
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
                                            ->content(fn (?DesignCategory $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                        Forms\Components\Placeholder::make('updated_at')
                                            ->label('Last modified at')
                                            ->content(fn (?DesignCategory $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
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
				Color::make('color'),
                ImageColumn::make('image')->rounded(),
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
            'index' => Pages\ListDesignCategories::route('/'),
            'create' => Pages\CreateDesignCategory::route('/create'),
            'edit' => Pages\EditDesignCategory::route('/{record}/edit'),
        ];
    }
}
