<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
 <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Custom CSS -->
<style>
    body {
        background-color: #111827;
        color: #f3f4f6;
    }
    .card {
        background-color: #1e293b;
        border: none;
        color: #f3f4f6;
    }
    .card-header {
        background-color: #334155;
        border-bottom: 1px solid #475569;
    }
    .table {
        background-color: #1e293b;
        color: #f3f4f6;
    }
    .table th,
    .table td {
        border-color: #475569;
    }
    .btn-primary {
        background-color: #3b82f6;
        border: none;
    }
    .btn-primary:hover {
        background-color: #2563eb;
    }
    .badge-success {
        background-color: #10b981;
    }
    .badge-warning {
        background-color: #ca8a04;
    }
</style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
