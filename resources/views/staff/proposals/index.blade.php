@extends('layouts.app')

@section('content')
<div class="space-y-6 max-w-6xl mx-auto">
    <!-- Header Title & Top Action -->
    <div>
        <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-1">Staff Workflow / 00 • Proposal List</p>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Proposals</h2>
                <p class="text-xs text-slate-500 mt-1">Create, organise and track your parent proposals and child programs.</p>
            </div>
            <a href="{{ route('staff.proposals.create') }}" class="px-4 py-2 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                + New Proposal
            </a>
        </div>
    </div>

    <!-- Metric KPI Cards -->
    <div class="grid grid-cols-5 gap-4">
        <div class="bg-white border border-slate-200/80 rounded-xl p-4 shadow-sm">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $proposals->count() }}</span>
                <span class="text-xs text-slate-500 font-medium">All proposals</span>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-xl p-4 shadow-sm">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $proposals->where('status', 'draft')->count() }}</span>
                <span class="text-xs text-slate-500 font-medium">Drafts</span>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-xl p-4 shadow-sm">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $proposals->where('status', 'pending')->count() }}</span>
                <span class="text-xs text-slate-500 font-medium">Awaiting decision</span>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-xl p-4 shadow-sm">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $proposals->where('status', 'approved')->count() }}</span>
                <span class="text-xs text-slate-500 font-medium">Approved</span>
            </div>
        </div>

        <div class="bg-white border border-slate-200/80 rounded-xl p-4 shadow-sm">
            <div class="flex items-baseline gap-2">
                <span class="text-2xl font-bold text-slate-900">{{ $proposals->whereIn('status', ['kiv', 'rejected'])->count() }}</span>
                <span class="text-xs text-slate-500 font-medium">Other decisions</span>
            </div>
        </div>
    </div>

    <!-- Main Table Container -->
    <div class="bg-white border border-slate-200/80 rounded-xl shadow-sm overflow-hidden">
        
        <!-- Table Search & Filters Header -->
        <div class="p-6 border-b border-slate-100 space-y-4">
            <div>
                <h3 class="text-base font-bold text-slate-900">Your proposals</h3>
                <p class="text-xs text-slate-500 mt-0.5">Showing total of {{ $proposals->count() }} proposals • Academic year {{ date('Y') }}</p>
            </div>

            <div class="flex items-center gap-4 pt-2">
                <div class="flex-1 relative">
                    <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <input type="text" placeholder="Search by proposal title or reference..." class="w-full text-xs bg-slate-50 border border-slate-200 rounded-lg pl-9 pr-4 py-2.5 outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div class="w-44">
                    <select class="w-full text-xs bg-slate-50 border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500 text-slate-600">
                        <option value="">All statuses</option>
                        <option value="draft">Draft</option>
                        <option value="pending">Submitted</option>
                        <option value="approved">Approved</option>
                        <option value="kiv">KIV</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <div class="w-32">
                    <select class="w-full text-xs bg-slate-50 border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500 text-slate-600">
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                    </select>
                </div>

                <button class="px-4 py-2.5 text-xs font-semibold text-slate-600 bg-slate-100 rounded-lg hover:bg-slate-200 transition-colors">Reset</button>
            </div>
        </div>

        <!-- Proposals Data Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider bg-slate-50/70 border-b border-slate-100">
                        <th class="py-3 px-6">Proposal Title / Reference</th>
                        <th class="py-3 px-4">Created</th>
                        <th class="py-3 px-4">Requested Budget</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-6 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-xs text-slate-700">
                    @forelse($proposals as $proposal)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 px-6">
                                <p class="font-bold text-slate-900 text-sm">{{ $proposal->title }}</p>
                                <p class="text-[11px] text-slate-400 mt-0.5">
                                    EK-{{ date('Y') }}-0{{ $proposal->id }} • {{ $proposal->programs->count() }} {{ Str::plural('program', $proposal->programs->count()) }}
                                </p>
                            </td>

                            <td class="py-4 px-4 text-slate-500 whitespace-nowrap">
                                {{ $proposal->created_at->format('d M Y') }}
                            </td>

                            <td class="py-4 px-4 font-semibold text-slate-800 whitespace-nowrap">
                                RM {{ number_format($proposal->programs->sum('requested_budget'), 2) }}
                            </td>

                            <td class="py-4 px-4 whitespace-nowrap">
                                @if($proposal->status === 'draft')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-slate-100 text-slate-600 border border-slate-200">
                                        • Draft
                                    </span>
                                @elseif($proposal->status === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 text-blue-600 border border-blue-200">
                                        • Submitted
                                    </span>
                                @elseif($proposal->status === 'approved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200">
                                        • Approved
                                    </span>
                                @elseif($proposal->status === 'kiv')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-amber-50 text-amber-600 border border-amber-200">
                                        • KIV
                                    </span>
                                @elseif($proposal->status === 'rejected')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-rose-50 text-rose-600 border border-rose-200">
                                        • Rejected
                                    </span>
                                @endif
                            </td>

                            <td class="py-4 px-6 text-right whitespace-nowrap">
                                <a href="{{ route('staff.programs.create', ['proposal_id' => $proposal->id]) }}" class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                                    Manage Programs →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                <svg class="w-10 h-10 mx-auto mb-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                <p class="text-sm font-semibold text-slate-600">No proposals found</p>
                                <p class="text-xs text-slate-400 mt-1">Get started by creating your first parent proposal.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Footer Notice -->
        <div class="p-4 bg-slate-50/50 border-t border-slate-100 text-[11px] text-slate-400">
            Drafts are editable. Submitted proposals are read-only while under review. Open Manage Programs to view child programs, approved budgets, and reporting actions.
        </div>
    </div>
</div>
@endsection