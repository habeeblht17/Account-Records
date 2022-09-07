<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AssetExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    protected $selectedRows;

    public function __construct($selectedRows)
    {
        $this->selectedRows = $selectedRows;
    }

    public function map($asset): array
    {
        return [
            $asset->id,
            $asset->amount,
            $asset->type,
            $asset->description,
        ];
    }

    public function headings(): array
    {
        return [
            'SN',
            'Amount',
            'Type',
            'Description'
        ];
    }

    public function query()
    {
        return Asset::whereIn('id', $this->selectedRows);
    }
}
