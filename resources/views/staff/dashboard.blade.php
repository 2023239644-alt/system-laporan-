<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboards - e-LAPORAN UiTM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 flex h-screen overflow-hidden text-slate-800 font-sans">

    <!-- Dark Sidebar -->
    <aside class="w-64 bg-[#0f172a] text-white flex flex-col justify-between shadow-xl z-20 shrink-0">
        <div>
            <!-- Header Logo -->
            <div class="h-20 flex items-center px-6 gap-3 border-b border-slate-800">
                <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center font-bold text-white text-xl shadow-md">
                    e
                </div>
                <div>
                    <h1 class="text-base font-bold tracking-tight text-white leading-tight">e-LAPORAN</h1>
                    <p class="text-[10px] text-slate-400 tracking-wider">uitm</p>
                </div>
            </div>

            <!-- Staff Workspace Menu -->
            <div class="px-4 py-6">
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider px-3 mb-3">Staff Workspace</p>
                <nav class="space-y-1">
                    <a href="/staff/dashboard" class="flex items-center gap-3 px-3 py-2.5 bg-blue-600 text-white rounded-lg font-medium text-sm shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        Dashboard
                    </a>
                    <a href="/staff/proposals/create" class="flex items-center gap-3 px-3 py-2.5 text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-colors font-medium text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Proposals
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2.5 text-slate-400 hover:bg-slate-800/60 hover:text-white rounded-lg transition-colors font-medium text-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Program Reports
                    </a>
                </nav>

                <!-- Access Info Card -->
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

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-slate-800 space-y-2 text-xs text-slate-400">
            <a href="#" class="flex items-center gap-2 px-3 py-1.5 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Help & guidance
            </a>
            <a href="#" class="flex items-center gap-2 px-3 py-1.5 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                University single sign-on
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col h-screen overflow-y-auto">
        
        <!-- Top Navbar -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <button class="text-slate-400 hover:text-slate-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <div class="flex items-center gap-3">
                    <span class="text-base font-bold text-slate-900 tracking-tight">e-LAPORAN</span>
                    <span class="text-slate-300">|</span>
                    <span class="text-xs text-slate-500 font-medium">Proposal & compliance portal</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button class="text-slate-400 hover:text-slate-600 relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <div class="flex items-center gap-3 pl-2 border-l border-slate-200">
                    <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs">
                        NA
                    </div>
                    <div class="text-left leading-tight">
                        <p class="text-xs font-semibold text-slate-900">Dr. Nur Aisyah Rahman</p>
                        <p class="text-[10px] text-slate-400">Staff • Faculty of Social Sciences</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Workspace -->
        <main class="p-8 space-y-6 max-w-7xl mx-auto w-full">

            <!-- Yellow Warning Banner -->
            <div class="bg-amber-50 border border-amber-200/80 rounded-xl p-4 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="p-2 bg-amber-100/60 rounded-lg text-amber-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-xs font-bold text-amber-900">1 report is approaching its deadline</h4>
                        <p class="text-xs text-amber-700 mt-0.5">Digital Skills Outreach 2026 - Due 25 October 2026. Reports must be submitted within 30 days of the program.</p>
                    </div>
                </div>
                <a href="#" class="px-3.5 py-1.5 bg-white text-slate-700 hover:bg-slate-50 border border-slate-200 text-xs font-semibold rounded-lg shadow-sm">
                    Prepare report
                </a>
            </div>

            <!-- Breadcrumbs & Page Header -->
            <div>
                <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-1">Staff Workflow / 01 • Overview</p>
                <h2 class="text-2xl font-bold text-slate-900">Dashboards</h2>
            </div>

            <!-- Welcome User Card -->
            <div class="bg-white rounded-xl border border-slate-200/80 p-6 flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg border border-blue-100">
                        NA
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-slate-900">Welcome back, Dr. Aisyah</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Dr. Nur Aisyah Rahman - aisyah.rahman@uninaya.edu.my</p>
                    </div>
                </div>
                <a href="/staff/proposals/create" class="px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-xs font-semibold flex items-center gap-2 shadow-sm transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    New Proposal
                </a>
            </div>

            <!-- 4 Metric Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
                <!-- Total Proposals -->
                <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <span class="text-xs font-medium text-slate-500">Total Proposals</span>
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-slate-900">12</span>
                        <p class="text-[11px] text-slate-400 mt-1">2 drafts • 3 awaiting a decision</p>
                    </div>
                </div>

                <!-- Total Programs -->
                <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <span class="text-xs font-medium text-slate-500">Total Programs</span>
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-slate-900">18</span>
                        <p class="text-[11px] text-slate-400 mt-1">Across all your proposals</p>
                    </div>
                </div>

                <!-- Submitted Reports -->
                <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <span class="text-xs font-medium text-slate-500">Submitted Reports</span>
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-slate-900">14</span>
                        <p class="text-[11px] text-slate-400 mt-1">12 acknowledged • 2 under review</p>
                    </div>
                </div>

                <!-- Pending Reports -->
                <div class="bg-white p-5 rounded-xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div class="flex justify-between items-start">
                        <span class="text-xs font-medium text-slate-500">Pending Reports</span>
                        <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="mt-4">
                        <span class="text-3xl font-bold text-slate-900">4</span>
                        <p class="text-[11px] text-amber-600 font-semibold mt-1">1 due within 7 days</p>
                    </div>
                </div>
            </div>

            <!-- Financials & Deadline Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <!-- Financial Bar Chart Card -->
                <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-sm lg:col-span-2 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-1">
                            <h3 class="text-sm font-bold text-slate-900">Requested vs approved funding</h3>
                            <span class="text-[11px] text-slate-500 font-medium px-2 py-0.5 bg-slate-100 rounded-md">• This year</span>
                        </div>
                        <p class="text-xs text-slate-400 mb-6">Your portfolio - 2026</p>

                        <div class="flex gap-12 mb-6">
                            <div>
                                <p class="text-xs text-slate-400 font-medium mb-1">Total requested</p>
                                <p class="text-xl font-bold text-slate-900">RM 48,600</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 font-medium mb-1">Total approved</p>
                                <p class="text-xl font-bold text-blue-600">RM 39,200</p>
                            </div>
                        </div>

                        <!-- CSS Chart Visual -->
                        <div class="h-40 flex items-end justify-between px-6 pt-6 pb-2 bg-slate-50/50 rounded-lg border border-slate-100">
                            <!-- Jul -->
                            <div class="flex gap-1.5 items-end h-full">
                                <div class="w-4 bg-blue-300 rounded-t h-[40%]"></div>
                                <div class="w-4 bg-blue-600 rounded-t h-[30%]"></div>
                            </div>
                            <!-- Aug -->
                            <div class="flex gap-1.5 items-end h-full">
                                <div class="w-4 bg-blue-300 rounded-t h-[75%]"></div>
                                <div class="w-4 bg-blue-600 rounded-t h-[60%]"></div>
                            </div>
                            <!-- Sep -->
                            <div class="flex gap-1.5 items-end h-full">
                                <div class="w-4 bg-blue-300 rounded-t h-[65%]"></div>
                                <div class="w-4 bg-blue-600 rounded-t h-[55%]"></div>
                            </div>
                            <!-- Oct -->
                            <div class="flex gap-1.5 items-end h-full">
                                <div class="w-4 bg-blue-300 rounded-t h-[85%]"></div>
                                <div class="w-4 bg-blue-600 rounded-t h-[70%]"></div>
                            </div>
                        </div>
                        <div class="flex justify-between px-7 mt-2 text-[11px] text-slate-400 font-medium">
                            <span>Jul</span><span>Aug</span><span>Sep</span><span>Oct</span>
                        </div>
                    </div>
                    <p class="text-[10px] text-slate-400 mt-4">July–October 2026 • Values in RM • Approved allocations, not actual expenditure</p>
                </div>

                <!-- Next Reporting Deadline Card -->
                <div class="bg-white p-6 rounded-xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-sm font-bold text-slate-900">Next reporting deadline</h3>
                            <svg class="w-4 h-4 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        
                        <span class="inline-block text-[10px] font-bold text-amber-800 bg-amber-100 px-2 py-0.5 rounded border border-amber-200/60 mb-3">
                            • Due in 5 days
                        </span>

                        <h4 class="text-base font-bold text-slate-900 mb-1">Digital Skills Outreach 2026</h4>
                        <p class="text-xs text-slate-400 mb-6">Completed 25 Sep 2026 • 60 participants</p>

                        <div class="flex justify-between items-center text-xs py-3 border-t border-slate-100">
                            <span class="text-slate-400">Report due</span>
                            <span class="font-bold text-slate-800">25 October 2026</span>
                        </div>
                    </div>

                    <div>
                        <a href="#" class="text-xs font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1 mb-2">
                            Prepare & submit report →
                        </a>
                        <p class="text-[10px] text-slate-400">Keep new proposal access active by submitting all reports on time.</p>
                    </div>
                </div>
            </div>

            <!-- Latest Proposals Data Table -->
            <div class="bg-white rounded-xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="p-6 flex justify-between items-center border-b border-slate-100">
                    <div>
                        <h3 class="text-base font-bold text-slate-900">Latest proposals</h3>
                        <p class="text-xs text-slate-400 mt-0.5">Continue a draft or check a recent decision.</p>
                    </div>
                    <a href="#" class="text-xs font-bold text-blue-600 hover:underline flex items-center gap-1">
                        View all proposals →
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-xs text-left">
                        <thead class="bg-slate-50 text-slate-400 font-medium border-b border-slate-100">
                            <tr>
                                <th class="px-6 py-3.5">Proposal title</th>
                                <th class="px-6 py-3.5">Created</th>
                                <th class="px-6 py-3.5">Requested</th>
                                <th class="px-6 py-3.5">Status</th>
                                <th class="px-6 py-3.5 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <!-- Row 1 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-slate-900">Student Leadership & Community Impact 2026</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">EK-2026-0148 • 1 program draft</p>
                                </td>
                                <td class="px-6 py-4 text-slate-500 font-medium">20 Oct 2026</td>
                                <td class="px-6 py-4 text-slate-800 font-medium">RM 4,800.00</td>
                                <td class="px-6 py-4">
                                    <span class="bg-slate-100 text-slate-600 text-[10px] font-semibold px-2 py-0.5 rounded border border-slate-200">
                                        • Draft
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">Manage Programs →</a>
                                </td>
                            </tr>
                            <!-- Row 2 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-slate-900">Campus Wellbeing Week 2026</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">EK-2026-0136 • 2 programs</p>
                                </td>
                                <td class="px-6 py-4 text-slate-500 font-medium">12 Oct 2026</td>
                                <td class="px-6 py-4 text-slate-800 font-medium">RM 6,200.00</td>
                                <td class="px-6 py-4">
                                    <span class="bg-blue-50 text-blue-600 text-[10px] font-semibold px-2 py-0.5 rounded border border-blue-100">
                                        • Submitted
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">View proposal →</a>
                                </td>
                            </tr>
                            <!-- Row 3 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-slate-900">Digital Skills Outreach 2026</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">EK-2026-0112 • Report due 25 Oct</p>
                                </td>
                                <td class="px-6 py-4 text-slate-500 font-medium">10 Sep 2026</td>
                                <td class="px-6 py-4 text-slate-800 font-medium">RM 3,600.00</td>
                                <td class="px-6 py-4">
                                    <span class="bg-emerald-50 text-emerald-600 text-[10px] font-semibold px-2 py-0.5 rounded border border-emerald-100">
                                        • Approved
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">Submit Report →</a>
                                </td>
                            </tr>
                            <!-- Row 4 -->
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="px-6 py-4">
                                    <p class="font-bold text-slate-900">Research Connect Forum 2026</p>
                                    <p class="text-[10px] text-slate-400 mt-0.5">EK-2026-0105 • Revised scope requested</p>
                                </td>
                                <td class="px-6 py-4 text-slate-500 font-medium">02 Sep 2026</td>
                                <td class="px-6 py-4 text-slate-800 font-medium">RM 7,500.00</td>
                                <td class="px-6 py-4">
                                    <span class="bg-amber-50 text-amber-700 text-[10px] font-semibold px-2 py-0.5 rounded border border-amber-200/60">
                                        • KIV
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-bold text-blue-600 hover:underline">View remarks →</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

</body>
</html>