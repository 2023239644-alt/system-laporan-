<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'introduction',
        'objective',
        'organizer',
        'status',
        'admin_remarks'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
}