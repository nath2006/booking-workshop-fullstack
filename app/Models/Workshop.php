<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Workshop extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'name',
        'slung',
        'thumbnail',
        'venue_thumbnail',
        'bg_map',
        'address',
        'about',
        'price',
        'is_open',
        'has_started',
        'started_at',
        'time_at',
        'category_id',
        'workshop_instructor_id',
    ];

        protected $casts = [
            'started_at' => 'date',
            'time_at' => 'datetime:H:i'
        ];

    public function setNameAttribute($value){
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function benefit():HasMany {
        return $this->hasMany(WorkshopBenefits::class);
    }

    public function participants(): HasMany {
        return $this->hasMany(WorkshopParticipants::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function instructor(): BelongsTo {
        return $this->belongsTo(WorkshopInstructors::class, 'workshop_instructor_id');
    }
}
