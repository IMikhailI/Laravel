<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    protected $table = 'room';
    public $timestamps = false;

    protected $fillable = ['building_id', 'room_number', 'beds_count', 'price'];

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function guests(): BelongsToMany
    {
        return $this->belongsToMany(Guest::class, 'booking', 'room_id', 'guest_id')
            ->withPivot(['date_start', 'date_end', 'people_count']);
    }
}
