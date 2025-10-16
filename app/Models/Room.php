<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Room extends Model
{
    use HasFactory;
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'living', 'room_id', 'guest_id')
            ->withPivot('check_in_date', 'check_out_date', 'guests_count', 'total_price', 'status');

    }

}
