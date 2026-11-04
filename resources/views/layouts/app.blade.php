<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Kertas Kerja UiTM</title>
    <!-- Assuming you are using Tailwind via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden text-gray-800">

    <!-- Sidebar (Matches the dark blue sidebar in your design) -->
    <aside class="w-64 bg-slate-900 text-white flex flex-col hidden md:flex">
        <div class="h-16 flex items-center px-6 border-b border-slate-700">
            <h1 class="text-xl font-bold">e-Laporan</h1>
        </div>
        <nav class="flex-1 px-4 py-6 space-y-2">
            <!-- Sidebar Links -->
            <a href="#" class="flex items-center gap-3 px-3 py-2 bg-blue-600 rounded-lg text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 hover:bg-slate-800 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Proposals
            </a>
        </nav>
        <div class="p-4 border-t border-slate-700 text-sm">
            <p>Logged in as: Staff</p>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
            <!-- Alert Banner Area (Matches the red/yellow warning banners in design) -->
            <div class="flex-1">
                @if(session('warning'))
                    <div class="bg-red-50 text-red-600 px-4 py-2 rounded-md text-sm font-medium border border-red-200">
                        {{ session('warning') }}
                    </div>
                @endif
            </div>
            <!-- Profile / Actions -->
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium">Muhammad Abu</span>
                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">M</div>
            </div>
        </header>

        <!-- Page Specific Content Injected Here -->
        <main class="p-6 flex-1">
            @yield('content')
        </main>
    </div>

</body>
</html>