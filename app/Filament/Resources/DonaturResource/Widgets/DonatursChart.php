<?php

namespace App\Filament\Resources\DonaturResource\Widgets;

use App\Models\Donatur;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\WidgetConfiguration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DonatursChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Status Pembayaran Donatur';

    protected function getData(): array
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('M');
        });

        // Inisialisasi data per bulan untuk 2 status
        $lunas = array_fill(1, 12, 0);
        $belumLunas = array_fill(1, 12, 0);
        $gagal = array_fill(1, 12, 0);

        // Query: jumlah donatur per bulan dan status
        $donaturData = Donatur::selectRaw('MONTH(created_at) as bulan, status_pembayaran, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('bulan', 'status_pembayaran')
            ->get();

        foreach ($donaturData as $item) {
            $bulan = (int)$item->bulan;
            if ($item->status_pembayaran === 'success') {
                $lunas[$bulan] = $item->total;
            } elseif ($item->status_pembayaran === 'pending') {
                $belumLunas[$bulan] = $item->total;
            } elseif ($item->status_pembayaran === 'failed') {
                $gagal[$bulan] = $item->total;
            }
        }

        return [
            'datasets' => [
                [
                    'label' => 'Success',
                    'data' => array_values($lunas),
                    'borderColor' => '#10B981', // Tailwind emerald-500
                    'backgroundColor' => '#10B981',
                ],
                [
                    'label' => 'Pending',
                    'data' => array_values($belumLunas),
                    'borderColor' => '#f6f8d2', // Tailwind f6f8d2
                    'backgroundColor' => '#f6f8d2',
                ],
                [
                    'label' => 'Gagal',
                    'data' => array_values($gagal),
                    'borderColor' => '#EF4444', // Tailwind red-500
                    'backgroundColor' => '#EF4444',
                ],
            ],
            'labels' => $months->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line'; // atau 'line'
    }

     public function getColumnSpan(): int|string
    {
        return 'full'; // Ini membuat chart full width
    }
}
