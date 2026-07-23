<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Edit Produk Apple
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white border border-gray-300 rounded-2xl shadow-sm p-8">

                <form action="{{ route('products.update', $product->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Kategori -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Kategori
                        </label>

                        <select
                            name="category_id"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('category_id')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Nama Produk -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $product->name) }}"
                            placeholder="Masukkan nama produk"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">

                        @error('name')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Harga -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Harga (Rp)
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price', $product->price) }}"
                            placeholder="Masukkan harga"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">

                        @error('price')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Stok -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stock"
                            value="{{ old('stock', $product->stock) }}"
                            placeholder="Masukkan jumlah stok"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">

                        @error('stock')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Deskripsi
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            placeholder="Masukkan deskripsi produk"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500">{{ old('description', $product->description) }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('products.index') }}"
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