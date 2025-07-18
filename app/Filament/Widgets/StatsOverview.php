<?php

namespace App\Filament\Widgets;

use App\Models\Campaign;
use App\Models\Article;
use App\Models\Donatur;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Campaign', Campaign::count())
                ->description('Semua campaign yang telah dibuat')
                ->descriptionIcon('heroicon-m-bolt')
                ->color('success'),

            Stat::make('Total Artikel', Article::count())
                ->description('Jumlah artikel yang dipublikasikan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),

            Stat::make('Total Donatur', Donatur::where('status_pembayaran','success')->count())
                ->description('Jumlah donatur yang tercatat')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('warning'),
        ];
    }
}
