<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Program;

class ProgramController extends Controller
{
    public function create($proposal_id)
    {
        // Fetch the parent proposal so we can show its title on the UI
        $proposal = Proposal::findOrFail($proposal_id);
        
        return view('staff.programs.create', compact('proposal'));
    }

    public function store(Request $request, $proposal_id)
    {
        // 1. Validate the Program details, Itineraries (arrays), and Expenditures (arrays)
        $validated = $request->validate([
            'program_type' => 'required|string|max:255',
            'program_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'venue' => 'required|string|max:255',
            
            // Dynamic Itinerary Validation
            'itineraries' => 'required|array|min:1',
            'itineraries.*.start_time' => 'required|date_format:H:i',
            'itineraries.*.end_time' => 'required|date_format:H:i|after:itineraries.*.start_time',
            'itineraries.*.activity' => 'required|string',
            'itineraries.*.person_in_charge' => 'required|string',

            // Dynamic Expenditure (Budget) Validation
            'expenditures' => 'required|array|min:1',
            'expenditures.*.item_description' => 'required|string',
            'expenditures.*.quantity' => 'required|integer|min:1',
            'expenditures.*.rate' => 'required|numeric|min:0.01',
        ]);

        // 2. Calculate Total Requested Budget
        $total_budget = 0;
        foreach ($request->expenditures as $expense) {
            $total_budget += ($expense['quantity'] * $expense['rate']);
        }

        // 3. Save the Program
        $program = Program::create([
            'proposal_id' => $proposal_id,
            'program_type' => $validated['program_type'],
            'program_name' => $validated['program_name'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'venue' => $validated['venue'],
            'requested_budget' => $total_budget,
            'report_status' => 'pending',
        ]);

        // 4. Save the Itineraries (Loop through the dynamic rows)
        foreach ($request->itineraries as $itinerary) {
            $program->itineraries()->create([
                'start_time' => $itinerary['start_time'],
                'end_time' => $itinerary['end_time'],
                'activity' => $itinerary['activity'],
                'person_in_charge' => $itinerary['person_in_charge'],
            ]);
        }

        // 5. Save the Expenditures (Loop through the dynamic rows)
        foreach ($request->expenditures as $expense) {
            $program->expenditures()->create([
                'item_description' => $expense['item_description'],
                'quantity' => $expense['quantity'],
                'rate' => $expense['rate'],
                'total_amount' => $expense['quantity'] * $expense['rate'], // Auto-calculated row total
            ]);
        }

        // 6. Redirect back to dashboard/index with success message
        return redirect()->route('staff.proposals.index')
                         ->with('success', 'Program, Itinerary, and Budget successfully added to the Proposal!');
    }
}