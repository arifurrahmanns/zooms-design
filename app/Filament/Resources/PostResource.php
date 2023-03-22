<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use App\Models\PostCategory;
use Filament\Forms;
use Filament\Forms\Components\Card;
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
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blogging';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([Grid::make()->columns(6)
            ->schema([
                Grid::make()->columns(1)->columnSpan(4)
                    ->schema([
                        Card::make()
                            ->schema([
                                TextInput::make('title')->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, callable $set) => $set('slug', Str::slug($state))),
                                TextInput::make('slug')->required(),

                                TextInput::make('youtube')->label('Youtube Link'),

                                Select::make('category_id')
                                    ->label('Category')
                                    ->required()
                                    ->options(PostCategory::all()->pluck('name', 'id'))
                                    ->searchable(),
                                RichEditor::make('content')->required(),
                                SpatieMediaLibraryFileUpload::make('thumbnail')
                                    ->collection('thumbnail')
                                    ->multiple()
                                    ->required()
                                    ->enableReordering(),
                                TextInput::make('author_name')->required()->placeholder('Name of the author'),
                                SpatieMediaLibraryFileUpload::make('author_image')
                                    ->multiple(false)
                                    ->required()
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
                                ->content(fn (?Post $record): string => $record ? $record->created_at->diffForHumans() : '-'),
                            Forms\Components\Placeholder::make('updated_at')
                                ->label('Last modified at')
                                ->content(fn (?Post $record): string => $record ? $record->updated_at->diffForHumans() : '-'),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
