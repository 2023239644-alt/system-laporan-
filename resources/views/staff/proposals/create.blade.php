@extends('layouts.app')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">
    <div>
        <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-1">Staff Workflow / 01 • Parent proposal</p>
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold text-slate-900">Create Proposal</h2>
            <span class="bg-slate-100 text-slate-600 text-[10px] font-semibold px-2 py-0.5 rounded border border-slate-200">Draft</span>
        </div>
        <p class="text-xs text-slate-500 mt-1">Start with the proposal overview. You will add individual programs in the next step.</p>
    </div>

    <!-- Info Banner -->
    <div class="bg-blue-50 border border-blue-200/80 rounded-xl p-4 flex items-center gap-3">
        <svg class="w-5 h-5 text-blue-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div class="text-xs text-blue-900">
            <strong>A single proposal may contain one or multiple programs.</strong><br>
            Please save the primary proposal first, then add at least one associated program before submitting your application to the Administration.
        </div>
    </div>

    <!-- Validation Errors Display -->
    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-4 rounded-xl border border-red-200 text-sm">
            <ul class="list-disc pl-5 space-y-1 text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff.proposals.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <!-- Proposal Overview -->
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <h3 class="text-sm font-bold text-slate-900">Proposal overview</h3>
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Proposal title <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title') }}" placeholder="e.g. Student Leadership & Community Impact 2026" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Introduction <span class="text-red-500">*</span></label>
                <textarea name="introduction" rows="3" required class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500" placeholder="A faculty-led initiative to equip students with practical leadership skills...">{{ old('introduction') }}</textarea>
            </div>
        </div>

        <!-- Objectives -->
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <h3 class="text-sm font-bold text-slate-900">Objectives</h3>
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Proposal objectives <span class="text-red-500">*</span></label>
                <textarea name="objective" rows="4" required class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500" placeholder="1. Develop leadership and project-planning skills among 80 students...">{{ old('objective') }}</textarea>
            </div>
        </div>

        <!-- Organizer -->
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm grid grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Organizing faculty / department / unit <span class="text-red-500">*</span></label>
                <input type="text" name="organizer" required value="{{ old('organizer', 'Student Development Unit') }}" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none bg-slate-50">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-700 mb-1">Proposal owner</label>
                <p class="text-xs font-bold text-slate-800 pt-2">Staff User</p>
                <p class="text-[10px] text-slate-400">Assigned from your staff account</p>
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('staff.proposals.index') }}" class="px-4 py-2 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">Cancel</a>
            <button type="submit" class="px-5 py-2 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">Save & Add Programs →</button>
        </div>
    </form>
</div>
@endsection