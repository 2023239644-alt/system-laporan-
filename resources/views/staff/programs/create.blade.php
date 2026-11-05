@extends('layouts.app')

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">
    <!-- Header Navigation -->
    <div>
        <p class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-1">Staff Workflow / 02 • Add Child Program</p>
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Add New Program</h2>
                <p class="text-xs text-slate-500 mt-1">Parent Proposal: <strong class="text-slate-800">{{ $proposal->title }}</strong></p>
            </div>
            <span class="bg-blue-50 text-blue-700 border border-blue-200 text-[10px] font-semibold px-2.5 py-1 rounded-full">Step 2 of 2</span>
        </div>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-50 text-red-600 p-4 rounded-xl border border-red-200 text-sm">
            <p class="font-bold text-xs mb-1">Please fix the following errors:</p>
            <ul class="list-disc pl-5 space-y-1 text-xs">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('staff.programs.store', ['proposal_id' => $proposal->id]) }}" method="POST" class="space-y-6">
        @csrf

        <!-- SECTION 1: PROGRAM DETAILS -->
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <h3 class="text-sm font-bold text-slate-900 border-b border-slate-100 pb-3">1. Program Details</h3>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Program Type <span class="text-red-500">*</span></label>
                    <input type="text" name="program_type" required value="{{ old('program_type') }}" placeholder="e.g. Workshop, Seminar, Community Outreach" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Program Name <span class="text-red-500">*</span></label>
                    <input type="text" name="program_name" required value="{{ old('program_name') }}" placeholder="e.g. Leadership & Community Impact Workshop" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Start Date <span class="text-red-500">*</span></label>
                    <input type="date" name="start_date" required value="{{ old('start_date') }}" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">End Date <span class="text-red-500">*</span></label>
                    <input type="date" name="end_date" required value="{{ old('end_date') }}" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-700 mb-1">Venue <span class="text-red-500">*</span></label>
                    <input type="text" name="venue" required value="{{ old('venue') }}" placeholder="e.g. Dewan Bestari, UiTM" class="w-full text-xs border border-slate-200 rounded-lg p-2.5 outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <!-- SECTION 2: ITINERARY (DYNAMIC ADD ROW) -->
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                <h3 class="text-sm font-bold text-slate-900">2. Program Itinerary</h3>
                <button type="button" id="add-itinerary-btn" class="px-3 py-1.5 text-xs font-semibold text-blue-600 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors">
                    + Add Time Slot
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="itinerary-table">
                    <thead>
                        <tr class="text-[11px] font-semibold text-slate-500 border-b border-slate-200 bg-slate-50">
                            <th class="p-2.5 w-32">Start Time</th>
                            <th class="p-2.5 w-32">End Time</th>
                            <th class="p-2.5">Activity Description</th>
                            <th class="p-2.5 w-48">Person In Charge</th>
                            <th class="p-2.5 w-16 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="itinerary-rows" class="divide-y divide-slate-100 text-xs">
                        <!-- Initial Row 0 -->
                        <tr>
                            <td class="p-2"><input type="time" name="itineraries[0][start_time]" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                            <td class="p-2"><input type="time" name="itineraries[0][end_time]" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                            <td class="p-2"><input type="text" name="itineraries[0][activity]" placeholder="Registration & Briefing" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                            <td class="p-2"><input type="text" name="itineraries[0][person_in_charge]" placeholder="Committee Leader" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                            <td class="p-2 text-center">
                                <button type="button" class="text-red-500 hover:text-red-700 font-bold remove-row-btn">&times;</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- SECTION 3: EXPENDITURE BUDGET (DYNAMIC ADD ROW + AUTO-CALCULATE) -->
        <div class="bg-white rounded-xl border border-slate-200/80 p-6 shadow-sm space-y-4">
            <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                <h3 class="text-sm font-bold text-slate-900">3. Estimated Expenditure</h3>
                <button type="button" id="add-expenditure-btn" class="px-3 py-1.5 text-xs font-semibold text-blue-600 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition-colors">
                    + Add Item Row
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" id="expenditure-table">
                    <thead>
                        <tr class="text-[11px] font-semibold text-slate-500 border-b border-slate-200 bg-slate-50">
                            <th class="p-2.5">Item Description</th>
                            <th class="p-2.5 w-24">Quantity</th>
                            <th class="p-2.5 w-32">Rate (RM)</th>
                            <th class="p-2.5 w-36">Total Amount (RM)</th>
                            <th class="p-2.5 w-16 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="expenditure-rows" class="divide-y divide-slate-100 text-xs">
                        <!-- Initial Row 0 -->
                        <tr class="expenditure-row">
                            <td class="p-2"><input type="text" name="expenditures[0][item_description]" placeholder="Meals & Refreshments" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                            <td class="p-2"><input type="number" min="1" name="expenditures[0][quantity]" required class="w-full border border-slate-200 rounded p-2 text-xs item-qty" value="1"></td>
                            <td class="p-2"><input type="number" step="0.01" min="0" name="expenditures[0][rate]" required class="w-full border border-slate-200 rounded p-2 text-xs item-rate" placeholder="0.00"></td>
                            <td class="p-2"><input type="text" readonly class="w-full border border-slate-200 bg-slate-50 rounded p-2 text-xs font-bold text-slate-700 item-total" value="0.00"></td>
                            <td class="p-2 text-center">
                                <button type="button" class="text-red-500 hover:text-red-700 font-bold remove-row-btn">&times;</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Grand Total Calculation Display -->
            <div class="bg-blue-50/60 border border-blue-100 p-4 rounded-xl flex justify-between items-center mt-4">
                <span class="text-xs font-semibold text-blue-900">Total Requested Budget:</span>
                <span class="text-lg font-extrabold text-blue-700">RM <span id="grand-total">0.00</span></span>
            </div>
        </div>

        <!-- Form Submit Actions -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('staff.proposals.index') }}" class="px-4 py-2 text-xs font-semibold text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 transition-colors">Cancel</a>
            <button type="submit" class="px-5 py-2 text-xs font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg shadow-sm transition-colors">Save Program & Finish →</button>
        </div>
    </form>
</div>

<!-- Dynamic Rows & Auto-Calculate JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let itineraryIndex = 1;
        let expenditureIndex = 1;

        // --- 1. ITINERARY DYNAMIC ROWS ---
        document.getElementById('add-itinerary-btn').addEventListener('click', function () {
            const container = document.getElementById('itinerary-rows');
            const row = document.createElement('tr');
            row.innerHTML = `
                <td class="p-2"><input type="time" name="itineraries[${itineraryIndex}][start_time]" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                <td class="p-2"><input type="time" name="itineraries[${itineraryIndex}][end_time]" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                <td class="p-2"><input type="text" name="itineraries[${itineraryIndex}][activity]" placeholder="Activity details" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                <td class="p-2"><input type="text" name="itineraries[${itineraryIndex}][person_in_charge]" placeholder="Person in charge" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                <td class="p-2 text-center">
                    <button type="button" class="text-red-500 hover:text-red-700 font-bold remove-row-btn">&times;</button>
                </td>
            `;
            container.appendChild(row);
            itineraryIndex++;
        });

        // --- 2. EXPENDITURE DYNAMIC ROWS ---
        document.getElementById('add-expenditure-btn').addEventListener('click', function () {
            const container = document.getElementById('expenditure-rows');
            const row = document.createElement('tr');
            row.className = 'expenditure-row';
            row.innerHTML = `
                <td class="p-2"><input type="text" name="expenditures[${expenditureIndex}][item_description]" placeholder="Item description" required class="w-full border border-slate-200 rounded p-2 text-xs"></td>
                <td class="p-2"><input type="number" min="1" name="expenditures[${expenditureIndex}][quantity]" required class="w-full border border-slate-200 rounded p-2 text-xs item-qty" value="1"></td>
                <td class="p-2"><input type="number" step="0.01" min="0" name="expenditures[${expenditureIndex}][rate]" required class="w-full border border-slate-200 rounded p-2 text-xs item-rate" placeholder="0.00"></td>
                <td class="p-2"><input type="text" readonly class="w-full border border-slate-200 bg-slate-50 rounded p-2 text-xs font-bold text-slate-700 item-total" value="0.00"></td>
                <td class="p-2 text-center">
                    <button type="button" class="text-red-500 hover:text-red-700 font-bold remove-row-btn">&times;</button>
                </td>
            `;
            container.appendChild(row);
            expenditureIndex++;
        });

        // --- 3. REMOVE ROW DELEGATION ---
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-row-btn')) {
                const row = e.target.closest('tr');
                const isExpenditure = row.classList.contains('expenditure-row');
                row.remove();
                if (isExpenditure) {
                    calculateGrandTotal();
                }
            }
        });

        // --- 4. REAL-TIME AUTO-CALCULATION ---
        document.addEventListener('input', function (e) {
            if (e.target.classList.contains('item-qty') || e.target.classList.contains('item-rate')) {
                const row = e.target.closest('tr');
                const qty = parseFloat(row.querySelector('.item-qty').value) || 0;
                const rate = parseFloat(row.querySelector('.item-rate').value) || 0;
                const total = qty * rate;
                
                row.querySelector('.item-total').value = total.toFixed(2);
                calculateGrandTotal();
            }
        });

        function calculateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.item-total').forEach(input => {
                grandTotal += parseFloat(input.value) || 0;
            });
            document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
        }
    });
</script>
@endsection