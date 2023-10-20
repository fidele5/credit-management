<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreditDocument extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'credit_id',
        'document_name',
        'file_path',
        'created_by',
        'deleted_by'
    ];

    /**
     * Get the credit that owns the CreditDocument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function credit()
    {
        return $this->belongsTo(Credit::class);
    }

    /**
     * Get the created_by that owns the CreditDocument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the deleted_by that owns the CreditDocument
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function deleted_by()
    {
        return $this->belongsTo(User::class);
    }
}
