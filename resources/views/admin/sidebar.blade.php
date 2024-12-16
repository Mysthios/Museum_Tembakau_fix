<!-- resources/views/admin/sidebar.blade.php -->
<div class="w-64 bg-gray-800 text-white h-full p-5">
    <h2 class="text-xl font-bold text-center mb-8">Admin Museum Tembakau</h2>
    <ul class="space-y-6">
        <li>
            <a href="{{ route('admin.read_adminacara') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                Manajemen Acara
            </a>
        </li>
        <li>
            <a href="{{ route('admin.read_adminkoleksi') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                Manajemen Koleksi
            </a>
        </li>
        <li>
            <a href="{{ route('admin.read_admintiket') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                Manajemen Tiket
            </a>
        </li>
        <li>
            <a href="{{ route('admin.read_adminprogramdonasi') }}" class="block px-4 py-2 rounded-md hover:bg-gray-700">
                Manajemen Donasi
            </a>
        </li>
    </ul>
</div>
