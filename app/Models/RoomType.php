<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get all of the rooms for the RoomType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
