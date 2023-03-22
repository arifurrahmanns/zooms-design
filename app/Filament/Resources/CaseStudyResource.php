<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CaseStudyResource\Pages;
use App\Models\CaseStudy;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BooleanColumn;
use Illuminate\Support\Str;

class CaseStudyResource extends Resource
{
    protected static ?string $model = CaseStudy::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Items';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Grid::make()->columns(6)
            ->schema([
                Grid::make()->columns(1)->columnSpan(4)
                    ->schema([
                        Card::make()
                            ->schema([
                                TextInput::make('title')
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')->required(),
                                TextInput::make('youtube')->label('Youtube Link'),
                                RichEditor::make('content'),
                                SpatieMediaLibraryFileUpload::make('thumbnail')
                                    ->collection('thumbnail')
                                    ->multiple()
                                    ->enableReordering(),
                                TextInput::make('author_name')->placeholder('Name of the author')->default('admin'),
                                SpatieMediaLibraryFileUpload::make('author_image')
                                    ->multiple(false)
                                    ->collection('author_image'),
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
                                ->content(fn (?CaseStudy $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn (?CaseStudy $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
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
            'index' => Pages\ListCaseStudies::route('/'),
            'create' => Pages\CreateCaseStudy::route('/create'),
            'edit' => Pages\EditCaseStudy::route('/{record}/edit'),
        ];
    }
}
