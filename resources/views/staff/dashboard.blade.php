@extends('layouts.app')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Dashboard</h2>
            <p class="text-sm text-gray-500">Welcome back, monitor your paperwork here.</p>
        </div>
        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium shadow-sm">
            + New Proposal
        </button>
    </div>

    <!-- Metric Cards (Matching the 4 cards in your design) -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
            <h3 class="text-sm font-medium text-gray-500 mb-2">Total Proposals</h3>
            <span class="text-3xl font-bold text-gray-900">12</span>
        </div>
        <!-- Add the other 3 cards here -->
    </div>
@endsection