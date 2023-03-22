<?php

namespace App\Filament\Widgets;

use App\Models\CaseStudy;
use App\Models\ContactUs;
use App\Models\Item;
use App\Models\OrderInquiry;
use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class CaseStudiesOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Order Request (New)', OrderInquiry::query()->where('status', 'New')->count()),
            Card::make('Inquiry Request (New)', ContactUs::query()->where('status', 'New')->count()),
            Card::make('Total Case Studies', CaseStudy::query()->count()),
            Card::make('Total Design Item', Item::query()->count()),
            Card::make('Total Post', Post::query()->count()),
        ];
    }
}
