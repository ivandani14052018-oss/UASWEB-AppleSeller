<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Daftar Transaksi
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-300 rounded-2xl shadow-sm p-6">

                <!-- Tombol -->
                <div class="flex justify-between items-center mb-6">

                    <a href="{{ route('transactions.create') }}"
                        class="px-5 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition duration-300">
                        + Transaksi Baru
                    </a>

                </div>

                <table class="min-w-full border border-gray-300">

                    <thead class="bg-gray-900 text-white">

                        <tr>
                            <th class="p-3 text-center">No</th>
                            <th class="p-3">Produk</th>
                            <th class="p-3 text-center">Harga</th>
                            <th class="p-3 text-center">Qty</th>
                            <th class="p-3 text-center">Total</th>
                            <th class="p-3 text-center">Tanggal</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($transactions as $transaction)

                        <tr class="hover:bg-gray-100 transition">

                            <td class="border p-3 text-center">
                                {{ $loop->iteration }}
                            </td>

                            <td class="border p-3">
                                {{ $transaction->product->name }}
                            </td>

                            <td class="border p-3 text-center">
                                Rp {{ number_format($transaction->product->price, 0, ',', '.') }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $transaction->qty }}
                            </td>

                            <td class="border p-3 text-center font-semibold">
                                Rp {{ number_format($transaction->total, 0, ',', '.') }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $transaction->created_at->format('d-m-Y H:i') }}
                            </td>

                            <td class="border p-3 text-center">

                                <a href="{{ route('transactions.edit', $transaction->id) }}"
                                    class="inline-block px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition">
                                    Edit
                                </a>

                                <form action="{{ route('transactions.destroy', $transaction->id) }}"
                                    method="POST"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirmDelete(this.form)"
                                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="border p-6 text-center text-gray-500">

                                Belum ada transaksi.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>
