<?php

namespace App\Filament\Widgets;

use App\Models\Director;
use Filament\Widgets\Widget;

class DirectorsWidget extends Widget
{
    protected string $view = 'filament.widgets.directors';
    
    protected int | string | array $columnSpan = 'full';
    
    public function getViewData(): array
    {
        return [
            'totalDirectors' => Director::count(),
            'newDirectorsThisMonth' => Director::whereMonth('created_at', now()->month)->count(),
            'recentDirectors' => Director::with('company')
                ->latest()
                ->take(5)
                ->get(),
        ];
    }
}
