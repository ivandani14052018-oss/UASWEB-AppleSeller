<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Tambah Produk Apple
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('products.store') }}" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label>Kategori</label>

                        <select
                            name="category_id"
                            class="w-full border rounded p-2">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>

                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label>Nama Produk</label>

                        <input
                            type="text"
                            name="name"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Harga</label>

                        <input
                            type="number"
                            name="price"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Stok</label>

                        <input
                            type="number"
                            name="stock"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label>Deskripsi</label>

                        <textarea
                            name="description"
                            class="w-full border rounded p-2"></textarea>
                    </div>

                    <button
                        class="px-5 py-2 bg-yellow-300 rounded">
                        Simpan
                    </button>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>