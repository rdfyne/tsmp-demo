<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VirtualTrainingApplication extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * Occurrence.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occurrence()
    {
        return $this->belongsTo(OnlineOccurrence::class, 'online_occurrence_id');
    }
}
