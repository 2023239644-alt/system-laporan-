<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index()
    {
        // For now, we will fetch all proposals. Later we will filter by Auth::id()
        // $proposals = Proposal::where('user_id', Auth::id())->latest()->get();
        $proposals = Proposal::latest()->get();
        
        return view('staff.proposals.index', compact('proposals'));
    }

    public function create()
    {
        return view('staff.proposals.create');
    }

    public function store(Request $request)
    {
        // 1. Validate the form inputs
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'objective' => 'required|string',
            'organizer' => 'required|string|max:255',
        ]);

        // 2. Save to database
        $proposal = Proposal::create([
            'user_id' => 1, // HARDCODED for now until we set up Login/Auth
            'title' => $validated['title'],
            'introduction' => $validated['introduction'],
            'objective' => $validated['objective'],
            'organizer' => $validated['organizer'],
            'status' => 'draft',
        ]);

        // 3. Redirect to Step 2 (Create Program) with the new Proposal ID
        return redirect()->route('staff.programs.create', ['proposal_id' => $proposal->id])
                         ->with('success', 'Proposal overview saved! Please add a program.');
    }
}