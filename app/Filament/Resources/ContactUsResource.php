<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactUsResource\Pages;
use App\Filament\Resources\ContactUsResource\RelationManagers;
use App\Models\ContactUs;
use App\Tables\Columns\InquiryStatus;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class ContactUsResource extends Resource
{
    protected static ?string $model = ContactUs::class;

    protected static ?string $navigationLabel = 'Inquiries Request';
    protected static ?string $label = 'Inquiries Request';
    protected static ?string $navigationGroup = 'Contact';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(6)
                ->schema([
                    Card::make()->columnSpan(4)
                        ->schema([
                            TextInput::make('full_name')->disabled()->required(),
                            TextInput::make('email')->disabled()->required(),
                            Textarea::make('message')->disabled()->label('Description')->required(),
                            Select::make('status')
                                ->options([
                                    'New' => 'New',
                                    'Resolved' => 'Resolved',
                                ])->required(),
                        ]),
                    Grid::make()->columnSpan(2)
                        ->schema([
                            // Card::make()->columnSpan(2)
                            //     ->schema([
                            //         Placeholder::make('Status'),
                            //         Toggle::make('is_visible')
                            //             ->default(true)
                            //             ->label('Visible')
                            //             ->helperText('This will be hidden from viewer'),
                            //     ]),
                            Forms\Components\Card::make()
                                ->schema([
                                    Forms\Components\Placeholder::make('created_at')
                                        ->label('Created at')
                                        ->content(fn (?ContactUs $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                                    Forms\Components\Placeholder::make('updated_at')
                                        ->label('Last modified at')
                                        ->content(fn (?ContactUs $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
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
                Tables\Columns\TextColumn::make('email')->sortable()->searchable(),
                InquiryStatus::make('status')->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->defaultSort('status');;
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
            'index' => Pages\ListContactUs::route('/'),
            // 'create' => Pages\CreateContactUs::route('/create'),
            'edit' => Pages\EditContactUs::route('/{record}/edit'),
        ];
    }
}
