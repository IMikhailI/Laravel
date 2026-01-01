<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guest extends Model
{
    protected $table = 'guest';
    public $timestamps = false;

    protected $fillable = ['full_name'];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'booking', 'guest_id', 'room_id')
            ->withPivot(['date_start', 'date_end', 'people_count']);
    }
}
