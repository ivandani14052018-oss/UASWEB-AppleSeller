<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard with sales & inventory metrics.
     */
    public function index()
    {
        $today = Carbon::today();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // --- Kartu ringkasan (semua pakai query agregat, bukan load seluruh baris) ---
        $totalProduk = Product::count();
        $totalKategori = Category::count();
        $totalStok = (int) Product::sum('stock');

        $penjualanHariIni = (int) Transaction::whereDate('created_at', $today)->sum('qty');
        $penjualanBulanIni = (int) Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('qty');

        $pendapatanHariIni = (int) Transaction::whereDate('created_at', $today)->sum('total');
        $pendapatanBulanIni = (int) Transaction::whereBetween('created_at', [$startOfMonth, $endOfMonth])->sum('total');

        $jumlahTransaksi = Transaction::count();

        $totalUser = User::count();

        // --- Produk terlaris bulan ini (berdasarkan qty terjual) ---
        $produkTerlaris = Transaction::select('product_id', DB::raw('SUM(qty) as total_qty'))
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->with('product:id,name')
            ->limit(5)
            ->get();

        // Fallback: kalau bulan ini belum ada transaksi, tampilkan terlaris sepanjang waktu
        if ($produkTerlaris->isEmpty()) {
            $produkTerlaris = Transaction::select('product_id', DB::raw('SUM(qty) as total_qty'))
                ->groupBy('product_id')
                ->orderByDesc('total_qty')
                ->with('product:id,name')
                ->limit(5)
                ->get();
        }

        // --- Data grafik: pendapatan 7 hari terakhir ---
        $rangeStart = $today->copy()->subDays(6);
        $rawChart = Transaction::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(total) as pendapatan'),
                DB::raw('SUM(qty) as unit')
            )
            ->whereDate('created_at', '>=', $rangeStart)
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get()
            ->keyBy('tanggal');

        $chartLabels = [];
        $chartPendapatan = [];
        $chartUnit = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $rangeStart->copy()->addDays($i);
            $key = $date->toDateString();
            $chartLabels[] = $date->translatedFormat('d M');
            $chartPendapatan[] = (int) ($rawChart[$key]->pendapatan ?? 0);
            $chartUnit[] = (int) ($rawChart[$key]->unit ?? 0);
        }

        // --- Aktivitas terbaru ---
        $aktivitasTerbaru = Transaction::with('product:id,name')
            ->latest()
            ->limit(8)
            ->get();
        
       return view('dashboard', compact(
    'totalKategori',
    'totalProduk',
    'totalStok',
    'penjualanHariIni',
    'penjualanBulanIni',
    'pendapatanHariIni',
    'pendapatanBulanIni',
    'jumlahTransaksi',
    'totalUser',
    'produkTerlaris',
    'chartLabels',
    'chartPendapatan',
    'chartUnit',
    'aktivitasTerbaru',
));
    }
}
