<x-app-layout>
    <div class="py-8 px-4 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">➕ Tambah Surat Masuk</h1>

        <form action="{{ route('surat-masuk.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Pengirim</label>
                <input type="text" name="pengirim" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Perihal</label>
                <textarea name="perihal" class="w-full border-gray-300 rounded-lg p-2" rows="4" required></textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">Simpan</button>
                <a href="{{ route('surat-masuk.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>