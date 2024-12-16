<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Acara</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
    <script>
        // Fungsi untuk membuka pop-up
        function openPopup() {
            document.getElementById('popupForm').classList.remove('hidden');
        }

        // Fungsi untuk menutup pop-up
        function closePopup() {
            document.getElementById('popupForm').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('admin.sidebar')
        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-700 mb-6">Manajemen Donasi</h1>

            <!-- Button to open the popup (Moved above the table) -->
            <button onclick="openPopup()" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Tambah Program Donasi</button>

            <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                <thead>
                    <tr>
                        <th class="border px-4 py-2 text-left">Judul Program</th>
                        <th class="border px-4 py-2 text-left">Deskripsi</th>
                        <th class="border px-4 py-2 text-left">Target</th>
                        <th class="border px-4 py-2 text-left">Terkumpul</th>
                        <th class="border px-4 py-2 text-left">Status</th>
                        <th class="border px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programDonasis as $program)
                        <tr>
                            <td class="border px-4 py-2">{{ $program->judul }}</td>
                            <td class="border px-4 py-2">{{ $program->deskripsi }}</td>
                            <td class="border px-4 py-2">{{ $program->jumlah_target }}</td>
                            <td class="border px-4 py-2">{{ $program->jumlah_sekarang }}</td>
                            <td class="border px-4 py-2">{{ $program->status }}</td>
                            <td class="border px-4 py-2">
                                <a href="#" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                <a href="#" class="text-red-500 hover:text-red-700">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pop-up Form (Initially hidden) -->
            <div id="popupForm" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white p-6 rounded-lg w-1/3">
                    <h2 class="text-2xl font-bold text-gray-700 mb-4">Tambah Program Donasi</h2>
                    <form action="{{ route('readadminprogramdonasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-4">
                            <label for="judul" class="block text-gray-700">Judul Program</label>
                            <input type="text" id="judul" name="judul" class="w-full border border-gray-300 px-4 py-2 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-gray-700">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="w-full border border-gray-300 px-4 py-2 rounded-md" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="jumlah_target" class="block text-gray-700">Jumlah Target</label>
                            <input type="number" id="jumlah_target" name="jumlah_target" class="w-full border border-gray-300 px-4 py-2 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_mulai" class="block text-gray-700">Tanggal Mulai</label>
                            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full border border-gray-300 px-4 py-2 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_selesai" class="block text-gray-700">Tanggal Selesai</label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="w-full border border-gray-300 px-4 py-2 rounded-md" required>
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700">Status</label>
                            <select id="status" name="status" class="w-full border border-gray-300 px-4 py-2 rounded-md" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="gambar" class="block text-gray-700">Gambar</label>
                            <input type="file" id="gambar" name="gambar" class="w-full border border-gray-300 px-4 py-2 rounded-md" required>
                        </div>

                        <div class="flex justify-between">
                            <button type="button" onclick="closePopup()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Tutup</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
