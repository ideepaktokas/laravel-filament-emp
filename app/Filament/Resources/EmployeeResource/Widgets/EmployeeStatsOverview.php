<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Forms\Components\Card as ComponentsCard;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $ind = Country::where('country_code', 'IN')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count())
            ->description('7% Increase')
            ->descriptionIcon('heroicon-s-trending-up')
            ->color('success'),

            Card::make($ind->name.' Employees', $ind ? $ind->employees_count : 0),

            Card::make('Average Time', '3:12'),
        ];
    }
}
