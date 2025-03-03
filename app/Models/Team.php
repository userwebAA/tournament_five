<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'company_name',
        'team_leader',
        'email',
        'phone',
        'player_count',
        'contact_address',
        'company_logo',
        'player_sizes',
        'accepts_terms',
        'accepts_newsletter',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'player_sizes' => 'array',
        'accepts_terms' => 'boolean',
        'accepts_newsletter' => 'boolean'
    ];
    //
}
