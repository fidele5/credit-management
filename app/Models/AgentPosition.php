<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'description'
    ];

    /**
     * Get all of the agents for the AgentPosition
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function agents()
    {
        return $this->hasMany(Agent::class);
    }
}
