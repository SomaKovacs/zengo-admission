<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


/**
 * @property string $name
 * @property int $county_id
 * @property int $id
 */
class City extends Model
{
    use HasFactory;

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }

}
