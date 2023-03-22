<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderInquiryResource\Pages;
use App\Filament\Resources\OrderInquiryResource\RelationManagers;
use App\Models\OrderInquiry;
use App\Tables\Columns\InquiryStatus;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;

class OrderInquiryResource extends Resource
{
    protected static ?string $model = OrderInquiry::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Contact';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(6)
                ->schema([
                    Card::make()->columnSpan(4)
                        ->schema([
                            TextInput::make('full_name')->disabled(),
                            TextInput::make('email')->disabled(),
                            TextInput::make('phone')->disabled(),
                            TextInput::make('company')->disabled(),
                            TextInput::make('interest_product')->disabled(),
                            Textarea::make('message')->disabled()->label('Description'),
                            SpatieMediaLibraryFileUpload::make('images')
                                ->collection('images')
                                ->imagePreviewHeight('200')
                                ->panelLayout('compact'),
                            Select::make('status')
                                ->options([
                                    'New' => 'New',
                                    'Resolved' => 'Resolved',
                                ])->required(),
                        ]),
                    Grid::make()->columnSpan(2)
                        ->schema([
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Placeholder::make('created_at')
                                        ->label('Created at')
                                        ->content(fn (?OrderInquiry $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                    Forms\Components\Placeholder::make('updated_at')
                                        ->label('Last modified at')
                                        ->content(fn (?OrderInquiry $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
                                ])
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')->searchable(),
                Tables\Columns\TextColumn::make('interest_product')->searchable(),
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                InquiryStatus::make('status')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListOrderInquiries::route('/'),
            // 'create' => Pages\CreateOrderInquiry::route('/create'),
            'edit' => Pages\EditOrderInquiry::route('/{record}/edit'),
        ];
    }
}
