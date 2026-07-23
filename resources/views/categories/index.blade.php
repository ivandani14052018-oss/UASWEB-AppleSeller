<x-app-layout>

    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Daftar Kategori Apple
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white border border-gray-300 rounded-2xl shadow-sm p-6">

                <!-- Tombol Tambah -->
                <div class="mb-6">
                    <a href="{{ route('categories.create') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gray-900 text-white rounded-lg hover:bg-black transition duration-300">
                        + Tambah Kategori
                    </a>
                </div>

                <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">

                    <thead class="bg-gray-900 text-white">
                        <tr>
                            <th class="p-3 text-center">ID</th>
                            <th class="p-3">Nama</th>
                            <th class="p-3">Deskripsi</th>
                            <th class="p-3 text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($categories as $category)

                        <tr class="hover:bg-gray-100 transition">

                            <td class="border p-3 text-center">
                                {{ $category->id }}
                            </td>

                            <td class="border p-3">
                                {{ $category->name }}
                            </td>

                            <td class="border p-3">
                                {{ $category->description }}
                            </td>

                            <td class="border p-3 text-center">

                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="inline-block px-4 py-2 bg-gray-700 text-white rounded-lg hover:bg-gray-800 transition">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category->id) }}"
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

                            <td colspan="4"
                                class="border p-6 text-center text-gray-500">

                                Belum ada kategori.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>