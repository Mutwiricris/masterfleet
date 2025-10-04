<?php

namespace App\Filament\Widgets;

use App\Models\Company;
use App\Models\Director;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalCompanies = Company::count();
        $activeCompanies = Company::where('status', 'active')->count();
        $totalDirectors = Director::count();
        $companiesThisMonth = Company::whereMonth('created_at', now()->month)->count();
        
        return [
            Stat::make('Total Companies', $totalCompanies)
                ->description($companiesThisMonth . ' new this month')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
                
            Stat::make('Active Companies', $activeCompanies)
                ->description(round(($activeCompanies / max($totalCompanies, 1)) * 100, 1) . '% of total')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('primary'),
                
            Stat::make('Total Directors', $totalDirectors)
                ->description('Across all companies')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),
                
            Stat::make('Average Directors', $totalCompanies > 0 ? round($totalDirectors / $totalCompanies, 1) : 0)
                ->description('Per company')
                ->descriptionIcon('heroicon-m-calculator')
                ->color('warning'),
        ];
    }
}
