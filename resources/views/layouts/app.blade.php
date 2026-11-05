<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-LAPORAN UiTM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 flex h-screen overflow-hidden text-slate-800 font-sans">

    <!-- Dark Sidebar -->
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col justify-between shadow-xl z-20 shrink-0 hidden md:flex">
        <div>
            <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center font-bold text-white text-xl shadow-md">e</div>
                <div>
                    <h1 class="text-base font-bold text-white leading-tight">e-LAPORAN</h1>
                    <p class="text-[10px] text-slate-400 tracking-wider">uitm</p>
                </div>
            </div>

            <div class="px-4 py-6">
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider px-3 mb-3">Staff Workspace</p>
                <nav class="space-y-1">
                    <a href="/staff/proposals" class="flex items-center gap-3 px-3 py-2.5 bg-blue-600 text-white rounded-lg font-medium text-sm shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Proposals
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-colors font-medium text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Program Reports
                    </a>
                </nav>

                <div class="mt-8 mx-1 p-4 rounded-xl bg-slate-800/40 border border-slate-700/50">
                    <p class="text-[10px] text-slate-400 uppercase font-semibold">Your Access</p>
                    <p class="text-xs font-semibold text-slate-200 mt-1">Staff • Programme office</p>
                    <p class="text-[11px] text-slate-400 mt-2 leading-relaxed">
                        Create proposals & programs<br>
                        Manage approved programs<br>
                        Prepare & submit reports
                    </p>
                </div>
            </div>
        </div>

        <div class="p-4 border-t border-slate-800 space-y-2 text-xs text-slate-400">
            <a href="#" class="flex items-center gap-2 px-3 py-1.5 hover:text-white transition-colors">Help & guidance</a>
            <a href="#" class="flex items-center gap-2 px-3 py-1.5 hover:text-white transition-colors">University single sign-on</a>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <span class="text-base font-bold text-slate-900">e-LAPORAN</span>
                <span class="text-slate-300 hidden sm:inline">|</span>
                <span class="text-xs text-slate-500 font-medium hidden sm:inline">Proposal & compliance portal</span>
            </div>

            <!-- Flash Banners -->
            <div class="flex-1 px-6 flex justify-center">
                @if(session('warning'))
                    <div class="bg-red-50 text-red-600 px-4 py-1.5 rounded-md text-sm font-medium border border-red-200 shadow-sm">
                        {{ session('warning') }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="bg-green-50 text-green-600 px-4 py-1.5 rounded-md text-sm font-medium border border-green-200 shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs">ST</div>
                <div class="text-left leading-tight hidden md:block">
                    <p class="text-xs font-semibold text-slate-900">Staff User</p>
                    <p class="text-[10px] text-slate-400">Staff • Faculty Unit</p>
                </div>
            </div>
        </header>

        <main class="p-8 max-w-7xl mx-auto w-full flex-1">
            @yield('content')
        </main>

        <footer class="px-8 py-4 bg-white border-t border-slate-200 flex justify-between items-center text-[11px] text-slate-400 shrink-0 mt-auto">
            <span>© {{ date('Y') }} Universiti Teknologi MARA • e-Laporan</span>
            <span>Registry Office / Secure university workspace</span>
        </footer>
    </div>
</body>
</html>