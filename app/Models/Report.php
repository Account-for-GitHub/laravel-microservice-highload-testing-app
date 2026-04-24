<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    protected $fillable = [
        'highload_id',
        'format',
        'report',
    ];

    public function highload(): BelongsTo {
        return $this->belongsTo(Highload::class);
    }
}
