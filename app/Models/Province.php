<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "type",
        "province_at"
    ];
    public function parent(){
        return $this->belongsTo(Province::class, "province_at");
    }
    public function childrens(){
        return $this->hasMany(Province::class,"province_at");
    }
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}