<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto">

            <div class="bg-white border border-gray-300 rounded-2xl shadow-sm p-8">

                <form action="{{ route('categories.update', $category->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-6">

                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Nama Kategori
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name', $category->name) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                            placeholder="Masukkan nama kategori">

                        @error('name')
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
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-gray-500"
                            placeholder="Masukkan deskripsi kategori">{{ old('description', $category->description) }}</textarea>

                        @error('description')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Tombol -->
                    <div class="flex justify-end gap-3">

                        <a href="{{ route('categories.index') }}"
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