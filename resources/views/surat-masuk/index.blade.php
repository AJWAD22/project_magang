<x-app-layout>
    <div class="py-8 px-4 max-w-7xl mx-auto">
        <!-- Judul -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">📬 Daftar Surat Masuk</h1>

        <!-- Tombol Tambah -->
        <div class="mb-6">
            <a href="{{ route('surat-masuk.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow transition">
                + Tambah Surat Masuk
            </a>
        </div>

        <!-- Tabel -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Surat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengirim</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Perihal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($suratMasuks as $surat)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $surat->nomor_surat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $surat->pengirim }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $surat->tanggal_masuk }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ Str::limit($surat->perihal, 50) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('surat-masuk.edit', $surat->id) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">Edit</a>
                                <form action="{{ route('surat-masuk.destroy', $surat->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $suratMasuks->links() }}
        </div>
    </div>
</x-app-layout>