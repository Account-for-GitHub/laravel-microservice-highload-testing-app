<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Highload extends Model
{
    protected $fillable = [
        'user_id',
        'url',
        'quantity',
        'request_json',
    ];
    
    public function responses(): HasMany {
        return $this->hasMany(Response::class);
    }

    public function reports(): HasOne {
        return $this->hasOne(Report::class);
    }
}
