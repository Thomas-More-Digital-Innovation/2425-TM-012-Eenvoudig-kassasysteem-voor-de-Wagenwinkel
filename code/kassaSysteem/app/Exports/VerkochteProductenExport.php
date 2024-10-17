<?php

namespace App\Exports;

use App\Models\Verkooplijn;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VerkochteProductenExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    protected $verkoopIds;
    protected $totalVerkoopprijs = 0;

    public function __construct($verkoopIds)
    {
        $this->verkoopIds = $verkoopIds;
    }

    public function collection()
    {
        // Fetch and map verkooplijnen
        $data = Verkooplijn::whereIn('verkoop_id', $this->verkoopIds)
            ->with(['product', 'verkoop'])
            ->get()
            ->map(function ($item) {
                // Add verkoopprijs to total
                $this->totalVerkoopprijs += $item->verkoopprijs*$item->hoeveelheid;

                return [
                    'Product Naam' => $item->product->naam,
                    'Verkoopprijs' => '€ ' . number_format($item->verkoopprijs, 2, ',', '.'),
                    'Hoeveelheid' => $item->hoeveelheid,
                    'Datum' => \Carbon\Carbon::parse($item->verkoop->datum_tijd)->format('Y-m-d'),
                    'Tijd' => \Carbon\Carbon::parse($item->verkoop->datum_tijd)->format('H:i'),
                ];
            });

        // Add the total row at the end
        $data->push([
            'Product Naam' => 'Totaal',
            'Verkoopprijs' => '€ ' . number_format($this->totalVerkoopprijs, 2, ',', '.'),
            'Hoeveelheid' => '',
            'Datum' => '',
            'Tijd' => '',
        ]);

        return $data;
    }

    public function headings(): array
    {
        return [
            'Product Naam',
            'Verkoopprijs',
            'Hoeveelheid',
            'Datum',
            'Tijd',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styles = [
            1 => [
                'font' => ['bold' => true, 'size' => 14, 'color' => ['argb' => 'FFFFFFFF']],
                'fill' => [
                    'fillType' => 'solid',
                    'color' => ['argb' => '60A5FA'],
                ],
            ],
        ];

        $lastRow = $sheet->getHighestRow();

        // Apply alternating row colors
        for ($i = 2; $i <= $lastRow - 1; $i++) {
            if ($i % 2 != 0) {
                $styles[$i] = [
                    'fill' => [
                        'fillType' => 'solid',
                        'color' => ['argb' => 'C0C0C0'],
                    ],
                ];
            }
        }

        // Style the total row (last row)
        $styles[$lastRow] = [
            'font' => ['bold' => true, 'size' => 12, 'color' => ['argb' => 'FFFFFFFF']],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['argb' => '60A5FA'],
            ],
        ];

        return $styles;
    }
}
