<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Daftar Produk Apple
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-300 rounded-2xl shadow-sm p-6">

                <!-- Tombol -->
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 mb-6">

                    <div class="flex flex-wrap gap-3">

                        <a href="{{ route('products.create') }}"
                            class="px-5 py-2 bg-gray-900 text-white rounded-lg hover:bg-black transition">
                            + Tambah Produk
                        </a>

                        <a href="{{ route('products.export.excel') }}"
                            class="px-5 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition">
                            Export Excel
                        </a>

                        <a href="{{ route('products.export.pdf') }}"
                            class="px-5 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                            Export PDF
                        </a>

                    </div>

                    <!-- Search -->
                    <form action="{{ route('products.index') }}" method="GET" class="flex gap-2">

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari produk..."
                            class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-500">

                        <button
                            type="submit"
                            class="bg-gray-900 text-white px-4 py-2 rounded-lg hover:bg-black transition">

                            Cari

                        </button>

                    </form>

                </div>

                <table class="min-w-full border border-gray-300">

                    <thead class="bg-gray-900 text-white">

                        <tr>

                            <th class="p-3 text-center">Kategori</th>
                            <th class="p-3">Produk</th>
                            <th class="p-3 text-center">Harga</th>
                            <th class="p-3 text-center">Stok</th>
                            <th class="p-3 text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($products as $product)

                        <tr class="hover:bg-gray-100 transition">

                            <td class="border p-3 text-center">
                                {{ $product->category->name }}
                            </td>

                            <td class="border p-3">
                                {{ $product->name }}
                            </td>

                            <td class="border p-3 text-center">
                                Rp {{ number_format($product->price,0,',','.') }}
                            </td>

                            <td class="border p-3 text-center">
                                {{ $product->stock }}
                            </td>

                            <td class="border p-3 text-center">

                                <a href="{{ route('products.edit',$product->id) }}"
                                    class="inline-block px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition">

                                    Edit

                                </a>

                                <form action="{{ route('products.destroy',$product->id) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="button"
                                        onclick="confirmDelete(this.form)"
                                        class="px-4 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="border p-6 text-center text-gray-500">

                                Belum ada produk.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

                <div class="mt-6">

                    {{ $products->links() }}

                </div>

            </div>

        </div>
    </div>

</x-app-layout>