    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Custom CSS -->
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;
            }

            body {
                background-color: #f3f4f6;
                color: #111827;
                display: flex;
                height: 100vh;
                overflow: hidden;
            }

            /* SIDEBAR */
            .sidebar {
                width: 240px;
                background: #e5e7eb;
                padding: 20px 0;
                display: flex;
                flex-direction: column;
                gap: 10px;
                border-right: 2px solid #d1d5db;
            }

            .sidebar-header {
                padding: 0 20px;
                display: flex;
                align-items: center;
                gap: 12px;
                margin-bottom: 30px;
            }

            .logo {
                width: 40px;
                height: 40px;
                background: #3b82f6;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                color: white;
            }

            .menu-title {
                padding: 0 20px;
                color: #4b5563;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 1px;
                margin-top: 20px;
                margin-bottom: 10px;
            }

            .menu-item {
                padding: 12px 20px;
                margin: 0 10px;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.2s ease;
                display: flex;
                align-items: center;
                gap: 12px;
                color: #4b5563;
                text-decoration: none;
                font-size: 15px;
            }

            .menu-item:hover,
            .menu-item.active {
                background: #ffffff;
                color: #111827;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }

            .logout-btn {
                margin-top: auto;
                padding: 12px 20px;
                margin: 0 10px;
                border-radius: 8px;
                cursor: pointer;
                display: flex;
                align-items: center;
                gap: 12px;
                color: #dc2626;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.2s ease;
            }

            .logout-btn:hover {
                background: #fee2e2;
                color: #dc2626;
            }

            /* MAIN CONTENT */
            .main-content {
                flex: 1;
                padding: 20px;
                overflow-y: auto;
                background: #f9fafb;
            }

            .header-bar {
                background: #1e40af;
                padding: 15px 20px;
                border-radius: 10px;
                margin-bottom: 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .header-title {
                font-size: 22px;
                font-weight: 600;
                color: white;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .date-box {
                background: white;
                color: #1e40af;
                padding: 8px 15px;
                border-radius: 8px;
                font-weight: 600;
                display: flex;
                align-items: center;
                gap: 8px;
            }

            .welcome-banner {
                background: white;
                padding: 20px;
                border-radius: 10px;
                margin-bottom: 30px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .welcome-text {
                text-align: left;
            }

            .welcome-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .welcome-subtitle {
                font-size: 14px;
                color: #6b7280;
            }

            .welcome-icon {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #3b82f6, #10b981);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                font-weight: bold;
                color: white;
            }

            .card-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 20px;
            }

            .card {
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                position: relative;
                transition: transform 0.2s ease;
            }

            .card:hover {
                transform: translateY(-3px);
            }

            .card-blue {
                background: #3b82f6;
                color: white;
            }

            .card-yellow {
                background: #ca8a04;
                color: white;
            }

            .card-title {
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 10px;
            }

            .card-value {
                font-size: 24px;
                font-weight: bold;
            }

            .card-icon {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 20px;
            }

            .user-avatar {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #6b7280;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                font-weight: bold;
                position: absolute;
                top: 20px;
                right: 20px;
            }
        </style>
    </head>
    <body>

        <!-- SIDEBAR -->
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="logo">F</div>
                <div style="font-weight: 600;">FAN SISTEM</div>
            </div>

            <div class="menu-title">MENU</div>

            <a href="/dashboard" class="menu-item active">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                </svg>
                Dashboard
            </a>

            <a href="/mengunduh-arsip" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                Mengunduh Arsip
            </a>

            <a href="/format-nomor-surat" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M9 2h6v6H9V2zm-1 14h8v2H8v-2zm8-4h-8v2h8v-2zm0-4h-8v2h8v-2z"/>
                </svg>
                Format Nomor Surat
            </a>

            <a href="/mengelola-kategori-arsip" class="menu-item">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M20 6h-8l-2-2H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-6 10H6v-2h8v2zm0-4H6v-2h8v2z"/>
                </svg>
                Mengelola Kategori Arsip
            </a>

            <a href="{{ route('logout') }}" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="logout-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17 8l-1.41 1.41L13 7V13c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6zM3 18h18v-2H3v2zm0-4h18v-2H3v2zm0-4h18V8H3v2z"/>
                </svg>
                LOG-OUT
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="header-bar">
                <div class="header-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                    </svg>
                    DASHBOARD
                </div>
                <div class="date-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M7 11h2v2H7zm14-5h-4V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2H3a2 2 0 00-2 2v12a2 2 0 002 2h16a2 2 0 002-2V7a2 2 0 00-2-2zM5 7h14v12H5V7z"/>
                    </svg>
                    Kamis-02-2025
                </div>
            </div>

            <div class="welcome-banner">
                <div class="welcome-text">
                    <div class="welcome-title">Selamat Datang {{ Auth::user()->name }}!</div>
                    <div class="welcome-subtitle">Anda Masuk Sebagai Admin</div>
                </div>
                <div class="welcome-icon">👁️</div>
            </div>
            <div class="card-grid">
                <a href="{{ route('surat-keluar.index') }}" style="text-decoration: none; color: inherit;">
                    <div class="card card-blue">
                        <div class="card-title">Surat Keluar</div>
                        <div class="card-value">{{ $suratKeluarCount }}</div>
                        <div class="card-icon">✉️</div>
                    </div>
                </a>
                <a href="{{ route('arsip-surat.index') }}" style="text-decoration: none; color: inherit;">
                    <div class="card card-yellow">
                        <div class="card-title">Arsip</div>
                        <div class="card-value">{{ $arsipSuratCount }}</div>
                        <div class="card-icon">✉️</div>
                    </div>
                </a>
            </div>

    </body>
    </html>