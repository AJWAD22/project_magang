<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <!-- Card Surat Masuk -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-2">📥 Surat Masuk</h3>
                <p class="text-gray-700 dark:text-gray-300">Total: <strong>12</strong></p>
            </div>

            <!-- Card Surat Keluar -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-2">📤 Surat Keluar</h3>
                <p class="text-gray-700 dark:text-gray-300">Total: <strong>7</strong></p>
            </div>

            <!-- Card User -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-2">👤 Pengguna</h3>
                <p class="text-gray-700 dark:text-gray-300">Total: <strong>3</strong></p>
            </div>

        </div>
    </div>
</x-app-layout>
