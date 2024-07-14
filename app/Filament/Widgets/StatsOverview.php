<?php

namespace App\Filament\Widgets;

use App\Models\Expense;
use App\Models\Income;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalCustomer = User::all()->count();
        $totalPhoneSoldOut = Income::all()->count();
        $totalIncome = Income::sum('money');


        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $MonthlyIncome = Income::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('money');
        $MonthlyExpense = Expense::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('money');

        return [
            Stat::make('Total Customer', $totalCustomer),
            Stat::make('Total Phones Sold out', $totalPhoneSoldOut),
            Stat::make('Total Income', $totalIncome),
            Stat::make('Monthly Income', $MonthlyIncome),
            Stat::make('Monthly Expense', $MonthlyExpense),
        ];
    }
}
