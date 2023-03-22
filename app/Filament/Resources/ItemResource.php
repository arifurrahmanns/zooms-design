<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\DesignCategory;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Support\Str;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-text';
    protected static ?string $navigationGroup = 'Items';

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
                                        TextInput::make('title')->required()
                                            ->reactive()
                                            ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                                        TextInput::make('slug')->required(),
                                        TextInput::make('desc')->label('Description')->required(),
                                        Select::make('category_id')
                                            ->label('Category')
                                            ->required()
                                            ->options(DesignCategory::all()->pluck('name', 'id'))
                                            ->searchable(),
                                        TextInput::make('contact_sale_url')
                                            ->label('Url for contact sale')
                                            ->placeholder('https://www.example.com'),
                                        SpatieMediaLibraryFileUpload::make('images')
                                            ->collection('images')
                                            ->multiple()
                                            ->imagePreviewHeight('200')
                                            ->panelLayout('compact')
                                            ->enableReordering(),
                                ]),
                                Card::make()
                                    ->schema([
                                        Placeholder::make('Plan Details'),
                                        Forms\Components\HasManyRepeater::make('plans')
                                            ->relationship('plans')
                                            ->schema([
                                                TextInput::make('title')->default('Basic')
                                                    ->required(),
                                                TextInput::make('sub_title')->default('Single Logo Design')
                                                    ->required(),
                                                Textarea::make('desc')->label('Description')
                                                    ->required()
                                                    ->default('Outlined, no backgrounds. One page with 1 frame of rough black and white sketch, not details.'),
                                                Textarea::make('features')->label('Features (separate by new line)')
                                                    ->required()
                                                    ->default("Source files provided\nJPG, PDF, PNG, Adobe Illustrator\n1 option design"),
                                                TextInput::make('price')->label('Price $')
                                                    ->required()
                                                    ->numeric()
                                                    ->reactive()
                                                    ->afterStateUpdated(fn($state, callable $set, callable $get) => $set('price_discount', $state - ($get('discount') / 100 * $state))),
                                                TextInput::make('discount')->label('Discount %')
                                                    ->numeric()
                                                    ->reactive()
                                                    ->afterStateUpdated(fn($state, callable $set, callable $get) => $set('price_discount', $get('price') - ($state / 100 * $get('price')))),
                                                TextInput::make('price_discount')->label('Price after discount $')
                                                    ->numeric(),
                                                TextInput::make('link')->label('Order Link')
                                                    ->required(),
                                                TextInput::make('delivery_days')->label('Delivery Date')
                                                    ->required()
                                                    ->default('3 Days Delivery'),
                                                TextInput::make('revisions')
                                                    ->required()
                                                    ->label('Revision')->default('Unlimited Revisions'),
                                            ])
                                            ->dehydrated()
                                            ->defaultItems(1)
                                            ->disableLabel()
                                            ->columns([
                                                // 'md' => 10,
                                            ])
                                            ->required()
                                            ->grid(3),
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
                                    ->helperText('This will be visible/hidden from viewer'),
                                Toggle::make('is_popular')
                                    ->default(false)
                                    ->label('Popular Item')
                                    ->helperText('This will be show in the popular section.'),
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
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                BooleanColumn::make('is_popular')->label('Popular')
                    ->trueColor('success')
                    ->falseColor('secondary')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable(),
                BooleanColumn::make('is_visible')->label('Visible')
                    ->trueColor('primary')
                    ->falseColor('warning')
                    ->sortable()
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
