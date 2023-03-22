<?php

namespace App\Filament\Resources\CustomizePageResource\Pages;

use App\Filament\Resources\CustomizePageResource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\EditRecord;

class EditCustomizePage extends EditRecord
{
    protected static string $resource = CustomizePageResource::class;

    protected function getForms(): array
    {
        switch ($this->record->name) {
            case 'Page: Become Member':
                $schema = $this->getFormForPageBecomeMember();
                break;
            case 'Page: Home Page':
                $schema = $this->getFormForPageHome();
                break;
            default:
                $schema = $this->getResourceForm(columns: config('filament.layout.forms.have_inline_labels') ? 1 : 2)->getSchema();
                break;
        }

        return [
            'form' => $this->makeForm()
                ->model($this->record)
                ->schema($schema)
                ->statePath('data')
                ->inlineLabel(config('filament.layout.forms.have_inline_labels')),
        ];
    }

    private function getFormForPageHome() {
        return [
            Grid::make()->columns(6)
            ->schema([
                Card::make()->columnSpan(4)
                    ->schema([
                        TextInput::make('name')->required()->disabled(),
                        TextInput::make('text1')->label('Heading')->required(),
                        TextInput::make('text2')->label('Heading (Product Name)')->required(),

                        TextInput::make('footer_url1')->label('[Facebook] Link')->required(),
                        TextInput::make('footer_url2')->label('[LinkedIn] Link')->required(),
                        TextInput::make('footer_url3')->label('[Google] Link')->required(),
                        TextInput::make('footer_url4')->label('[Telegram] Link')->required(),
                        TextInput::make('contact_now_url')->label('[Contact Now] Link')->required(),
                        TextInput::make('footer_title')->label('[Footer Title]')->required(),

                        SpatieMediaLibraryFileUpload::make('footer_image')
                            ->label('[Footer Image]')
                            ->collection('footer_image')
                            ->imagePreviewHeight('200')
                            ->panelLayout('compact'),
                    ]),
            ])
        ];
    }

    private function getFormForPageBecomeMember() {
        return [
            Grid::make()->columns(6)
            ->schema([
                Card::make()->columnSpan(4)
                    ->schema([
                        TextInput::make('name')->required()->disabled(),

                        SpatieMediaLibraryFileUpload::make('image_left')
                            ->label('Card Image (Left)')
                            ->collection('image_left')
                            ->required()
                            ->imagePreviewHeight('200')
                            ->panelLayout('compact'),

                        SpatieMediaLibraryFileUpload::make('image_right')
                            ->label('Card Image (Right)')
                            ->collection('image_right')
                            ->required()
                            ->imagePreviewHeight('200')
                            ->panelLayout('compact'),
                    ]),
            ])
        ];
    }
}
