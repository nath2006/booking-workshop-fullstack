<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WorkshopInstructors extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'avatar',
    ];

    public function workshops(): HasMany{
        return $this->hasMany(Workshop::class);
    }
}
