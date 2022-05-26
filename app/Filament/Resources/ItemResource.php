<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Category;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(6)
                    ->schema([
                        Grid::make()->columns(1)->columnSpan(4)
                            ->schema([
                                Card::make()
                                    ->schema([
                                        TextInput::make('title')->required(),
                                        TextInput::make('desc')->label('Description')->required(),
                                        Select::make('category_id')
                                            ->label('Category')
                                            ->options(Category::all()->pluck('name', 'id'))
                                            ->searchable(),
                                        SpatieMediaLibraryFileUpload::make('images')
                                            ->multiple()
                                            ->enableReordering(),
                                ]),
                                Card::make()
                                    ->schema([
                                        Placeholder::make('Plan Details'),
                                        Forms\Components\HasManyRepeater::make('plans')
                                        ->relationship('plans')
                                        ->schema([
                                            TextInput::make('title'),
                                            TextInput::make('sub_title'),
                                            RichEditor::make('desc')
                                                ->label('Description')
                                                ->disableAllToolbarButtons()
                                                ->enableToolbarButtons([
                                                    'bold',
                                                    'bulletList',
                                                    'italic',
                                                    'strike',
                                                ]),
                                            TextInput::make('price')
                                                ->numeric(),
                                            TextInput::make('link'),
                                        ])
                                        ->dehydrated()
                                        ->defaultItems(1)
                                        ->disableLabel()
                                        ->columns([
                                            // 'md' => 10,
                                        ])
                                        ->required(),
                                ]),
                        ]),
                        Grid::make()->columnSpan(2)
                            ->schema([
                            Card::make()
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
                                        ->content(fn (?Item $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                    Forms\Components\Placeholder::make('updated_at')
                                        ->label('Last modified at')
                                        ->content(fn (?Item $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                                ])
                            ])

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('category.name'),
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
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
