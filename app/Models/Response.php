<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Response extends Model
{
    protected $fillable = [
        'highload_id',
        'status',
        'response',
    ];
    
    public function highload(): BelongsTo {
        return $this->belongsTo(Highload::class);
    }
}
