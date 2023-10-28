<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Credit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'client_id',
        'credit_type_id',
        'amount',
        'start_date',
        'end_date',
        'status',
        'duration',
        'duration_unit',
        'accepted_by',
        'created_by',
        'accepted_at',
    ];

    /**
     * Get the client that owns the Credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the credit_type that owns the Credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function credit_type()
    {
        return $this->belongsTo(CreditType::class);
    }

    /**
     * Get all of the documents for the Credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany(CreditDocument::class);
    }

    /**
     * Get the user that owns the Credit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'accepted_by', 'id');
    }
}
