<x-app-layout>
    <div class="py-8 px-4 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">📤 Daftar Surat Keluar</h1>

        <div class="mb-6">
            <a href="{{ route('surat-keluar.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                + Tambah Surat Keluar
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nomor Surat</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Penerima</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Perihal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($suratKeluars as $surat)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 text-sm">{{ $surat->nomor_surat }}</td>
                            <td class="px-6 py-4 text-sm">{{ $surat->penerima }}</td>
                            <td class="px-6 py-4 text-sm">{{ $surat->tanggal_keluar }}</td>
                            <td class="px-6 py-4 text-sm">{{ Str::limit($surat->perihal, 50) }}</td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="text-yellow-600 mr-3">Edit</a>
                                <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600" onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $suratKeluars->links() }}
        </div>
    </div>
</x-app-layout>