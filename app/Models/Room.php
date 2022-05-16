<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'room_type_id', 'price'];

    /**
     * Get the roomType that owns the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }
}
