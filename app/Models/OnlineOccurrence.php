<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineOccurrence extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * Course.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course() {

        return $this->belongsTo(Course::class);
    }

    /**
     * Applications.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(VirtualTrainingApplication::class);
    }
}
