<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Staff\ProposalController;
use App\Http\Controllers\Staff\ProgramController;

Route::get('/', function () {
    return redirect()->route('staff.proposals.index'); // Temporary redirect to dashboard
});

// Staff Routes (Later we will add 'auth' middleware here)
Route::prefix('staff')->name('staff.')->group(function () {
    
    // Step 1: Proposal Routes
    Route::get('/proposals', [ProposalController::class, 'index'])->name('proposals.index');
    Route::get('/proposals/create', [ProposalController::class, 'create'])->name('proposals.create');
    Route::post('/proposals', [ProposalController::class, 'store'])->name('proposals.store');

    // Step 2: Program Routes (Attached to a specific proposal)
    Route::get('/proposals/{proposal_id}/programs/create', [ProgramController::class, 'create'])->name('programs.create');
    Route::post('/proposals/{proposal_id}/programs', [ProgramController::class, 'store'])->name('programs.store');
    
});