<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'amount',
        'stripe_session_id',
        'payment_method',
        'reference_number',
        'status',
        'notes'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
