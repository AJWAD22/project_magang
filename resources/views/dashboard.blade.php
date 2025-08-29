<x-app-layout>
    <div class="py-8">
        <!-- Header -->
        <div class="max-w-4xl mx-auto mb-8 p-4 bg-white rounded-lg shadow-md">
            <h1 class="text-2xl font-bold">Selamat Datang, {{ auth()->user()->name }}</h1>
            <p class="text-gray-600">Anda Login Sebagai <span class="font-semibold text-red-600">Admin</span>, Anda Memiliki Hak Akses Penuh Terhadap Sistem</p>
        </div>

        <!-- Grid Kartu -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
            <!-- Surat Masuk -->
            <div class="bg-cyan-400 p-6 rounded-lg shadow-md text-white">
                <div class="flex items-center">
                    <i class="fas fa-inbox text-xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium">Surat Masuk</h3>
                        <p class="text-2xl font-bold">{{ $suratMasuk }}</p>
                    </div>
                </div>
            </div>

            <!-- Surat Keluar -->
            <div class="bg-blue-500 p-6 rounded-lg shadow-md text-white">
                <div class="flex items-center">
                    <i class="fas fa-paper-plane text-xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium">Surat Keluar</h3>
                        <p class="text-2xl font-bold">{{ $suratKeluar }}</p>
                    </div>
                </div>
            </div>

            <!-- Pengguna -->
            <div class="bg-purple-500 p-6 rounded-lg shadow-md text-white">
                <div class="flex items-center">
                    <i class="fas fa-users text-xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium">Pengguna</h3>
                        <p class="text-2xl font-bold">{{ $pengguna }}</p>
                    </div>
                </div>
            </div>

            <!-- Transaksi -->
            <div class="bg-yellow-500 p-6 rounded-lg shadow-md text-white">
                <div class="flex items-center">
                    <i class="fas fa-file-alt text-xl mr-3"></i>
                    <div>
                        <h3 class="text-lg font-medium">Transaksi</h3>
                        <p class="text-2xl font-bold">50</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>