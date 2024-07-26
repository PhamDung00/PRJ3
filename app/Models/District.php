<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'type', 'province_id'];
    protected $table = 'district';

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
