<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Transaksi Baru
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                @if(session('error'))
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('transactions.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2 font-semibold">
                            Produk
                        </label>

                        <select name="product_id"
                                class="w-full border rounded p-2">

                            @foreach($products as $product)

                                <option value="{{ $product->id }}">
                                    {{ $product->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">

                        <label class="block mb-2 font-semibold">
                            Jumlah
                        </label>

                        <input
                            type="number"
                            name="qty"
                            min="1"
                            class="w-full border rounded p-2">

                    </div>

                    <button
                        class="px-5 py-2 bg-yellow-300 rounded hover:bg-yellow-400">

                        Simpan

                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>