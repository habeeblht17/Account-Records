<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use App\Models\Asset;
use Livewire\Component;

class Dashboard extends Component
{
    public function barChart()
    {

    }

    public function render()
    {
        $assets = Asset::select([
            'type',
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as month"),
            DB::raw('COUNT(id) as occurrence'),
            DB::raw('SUM(amount) as amount')
        ])
        ->groupBy('type')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        $report = [];
        $assets->each(function ($item) use (&$report) {
            $report[$item->month][$item->type] = [
                'occurrence' => $item->occurrence,
                'amount' => $item->amount
            ];
        });

        $types = $assets->pluck('type')
        ->sortBy('type')
        ->unique();

        $assetsYear = Asset::select([
            'type',
            DB::raw("DATE_FORMAT(created_at, '%Y') as year"),
            DB::raw('COUNT(id) as occurrence'),
            DB::raw('SUM(amount) as amount')
        ])
        ->groupBy('type')
        ->groupBy('year')
        ->orderBy('year')
        ->get();

        $report2 = [];
        $assetsYear->each(function ($item) use (&$report2) {
            $report2[$item->year][$item->type] = [
                'occurrence' => $item->occurrence,
                'amount' => $item->amount
            ];
        });

        $types2 = $assets->pluck('type')
        ->sortBy('type')
        ->unique();


        return view('livewire.dashboard', [
            'types' => $types, 'report' => $report,
            'types2' => $types2, 'report2' => $report2
            ])
            ->layout('layouts.base');
    }
}
