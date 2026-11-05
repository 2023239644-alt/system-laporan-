<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'program_type',
        'program_name',
        'start_date',
        'end_date',
        'venue',
        'requested_budget',
        'approved_budget',
        'report_status'
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function itineraries()
    {
        return $this->hasMany(Itinerary::class);
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}