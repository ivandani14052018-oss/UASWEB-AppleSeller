<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Edit Transaksi
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white border border-gray-300 rounded-2xl shadow-sm p-8">

                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Produk -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Produk
                        </label>

                        <select
                            name="product_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">

                            @foreach($products as $product)

                                <option
                                    value="{{ $product->id }}"
                                    {{ old('product_id', $transaction->product_id) == $product->id ? 'selected' : '' }}>

                                    {{ $product->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('product_id')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Jumlah -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Jumlah
                        </label>

                        <input
                            type="number"
                            name="qty"
                            min="1"
                            value="{{ old('qty', $transaction->qty) }}"
                            placeholder="Masukkan jumlah pembelian"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">

                        @error('qty')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('transactions.index') }}"
                           class="px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="px-5 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">
                            Update
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>