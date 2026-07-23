<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AppleSeller</title>

    <link rel="icon" type="image/png" href="{{ asset('images/apel.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen bg-gray-100">

        @include('layouts.navigation')

        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>

    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ session("success") }}',
    confirmButtonColor: '#111827',
    background: '#ffffff',
    color: '#111827',
    iconColor: '#16a34a',
    customClass: {
        popup: 'rounded-2xl'
    }
});
</script>
@endif

@if(session('error'))
<script>
function confirmDelete(form) {

    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: 'Data yang dihapus tidak dapat dikembalikan.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#111827',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        background: '#ffffff',
        color: '#111827',
        customClass: {
            popup: 'rounded-2xl'
        }
    }).then((result) => {

        if (result.isConfirmed) {
            form.submit();
        }

    });

    return false;
}
</script>
@endif
</body>
</html>