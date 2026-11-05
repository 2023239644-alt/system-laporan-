<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'start_time',
        'end_time',
        'activity',
        'person_in_charge'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}