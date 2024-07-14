<?php

namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

use App\Models\Expense;
use Filament\Widgets\ChartWidget;

class ExpenseChart extends ChartWidget
{
    protected static ?string $heading = 'Expense';

    protected function getData(): array
    {
        $data = Trend::model(Expense::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('money');

        return [
            'datasets' => [
                [
                    'label' => 'Blog posts',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
