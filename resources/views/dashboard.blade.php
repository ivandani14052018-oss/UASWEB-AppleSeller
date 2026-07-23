<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            Dashboard AppleSeller
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Card Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6 hover:shadow-lg transition">

    <div class="flex justify-between items-center">

        <div>

            <h3 class="text-sm uppercase tracking-wider text-gray-500 font-semibold">
                Kategori
            </h3>

            <p class="text-4xl font-extrabold text-black mt-3">
                {{ $totalKategori }}
            </p>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-10 h-10 text-gray-600"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.8"
                  d="M20 7L12 3L4 7v10l8 4 8-4V7z"/>

        </svg>

    </div>

</div>

              <div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6 hover:shadow-lg transition">

    <div class="flex justify-between items-center">

        <div>

            <h3 class="text-sm uppercase tracking-wider text-gray-500 font-semibold">
                Produk
            </h3>

            <p class="text-4xl font-extrabold text-black mt-3">
                {{ $totalProduk }}
            </p>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-10 h-10 text-gray-600"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.8"
                  d="M20 7L12 3L4 7v10l8 4 8-4V7z"/>

        </svg>

    </div>

</div>

                <div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6 hover:shadow-lg transition">

    <div class="flex justify-between items-center">

        <div>

            <h3 class="text-sm uppercase tracking-wider text-gray-500 font-semibold">
                Transaksi
            </h3>

            <p class="text-4xl font-extrabold text-black mt-3">
                {{ $jumlahTransaksi }}
            </p>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-10 h-10 text-gray-600"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.8"
                  d="M20 7L12 3L4 7v10l8 4 8-4V7z"/>

        </svg>

    </div>

</div>

                <div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6 hover:shadow-lg transition">

    <div class="flex justify-between items-center">

        <div>

            <h3 class="text-sm uppercase tracking-wider text-gray-500 font-semibold">
                User
            </h3>

            <p class="text-4xl font-extrabold text-black mt-3">
                {{ $totalUser }}
            </p>

        </div>

        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-10 h-10 text-gray-600"
             fill="none"
             viewBox="0 0 24 24"
             stroke="currentColor">

            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="1.8"
                  d="M20 7L12 3L4 7v10l8 4 8-4V7z"/>

        </svg>

    </div>

</div>
                
            </div>

            <!-- Ringkasan Penjualan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

                <div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6">
                    <h3 class="text-xl font-bold mb-4">
                        Penjualan Hari Ini
                    </h3>

                    <p class="text-3xl font-bold">
                        {{ $penjualanHariIni }}
                    </p>

                    <p class="mt-2">
                        Pendapatan :
                        Rp {{ number_format($pendapatanHariIni,0,',','.') }}
                    </p>
                </div>
                

               <div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6">
                    <h3 class="text-xl font-bold mb-4">
                        Penjualan Bulan Ini
                    </h3>

                    <p class="text-3xl font-bold">
                        {{ $penjualanBulanIni }}
                    </p>

                    <p class="mt-2">
                        Pendapatan :
                        Rp {{ number_format($pendapatanBulanIni,0,',','.') }}
                    </p>
                </div>
                <!-- Grafik Pendapatan -->
<div class="bg-white rounded-2xl border border-gray-300 shadow-sm p-6 mt-8">

    <h3 class="text-xl font-bold mb-4">
        Grafik Pendapatan 7 Hari Terakhir
    </h3>

    <canvas id="salesChart"></canvas>

</div>
<!-- Produk Terlaris -->
<div class="bg-white rounded-lg shadow p-6 mt-8">

    <h3 class="text-xl font-bold mb-4">
        Produk Terlaris
    </h3>

    <table class="min-w-full border">

       <thead class="bg-gray-900 text-white">

            <tr>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Terjual</th>
            </tr>

        </thead>

        <tbody>

        @forelse($produkTerlaris as $item)

            <tr class="hover:bg-gray-100 transition">

                <td class="border p-2">
                    {{ $item->product->name }}
                </td>

                <td class="border p-2 text-center">
                    {{ $item->total_qty }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="2" class="border p-3 text-center">
                    Belum ada data.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>
<!-- Aktivitas Terbaru -->
<div class="bg-white rounded-lg shadow p-6 mt-8">

    <h3 class="text-xl font-bold mb-4">
        Aktivitas Terbaru
    </h3>

    <table class="min-w-full border">

       <thead class="bg-gray-900 text-white">

            <tr>
                <th class="border p-2">Produk</th>
                <th class="border p-2">Qty</th>
                <th class="border p-2">Total</th>
                <th class="border p-2">Tanggal</th>
            </tr>

        </thead>

        <tbody>

        @forelse($aktivitasTerbaru as $trx)

            <tr class="hover:bg-gray-100 transition">

                <td class="border p-2">
                    {{ $trx->product->name }}
                </td>

                <td class="border p-2 text-center">
                    {{ $trx->qty }}
                </td>

                <td class="border p-2">
                    Rp {{ number_format($trx->total,0,',','.') }}
                </td>

                <td class="border p-2">
                    {{ $trx->created_at->format('d-m-Y H:i') }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="border p-3 text-center">
                    Belum ada transaksi.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('salesChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($chartLabels),
        datasets: [{
    label: 'Pendapatan',
    data: @json($chartPendapatan),
    borderColor: '#374151',
    backgroundColor: '#6B7280',
    pointBackgroundColor: '#111827',
    pointBorderColor: '#111827',
    borderWidth: 3,
    tension: 0.4,
    fill: false
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        }
    }
});
</script>
</x-app-layout>