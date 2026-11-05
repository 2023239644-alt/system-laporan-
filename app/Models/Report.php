<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'user_id',
        'report_summary',
        'actual_total_expenditure',
        'participant_list_file',
        'feedback_file',
        'proof_images'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}