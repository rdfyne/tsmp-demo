<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * Category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Occurrences.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occurrences()
    {
        return $this->hasMany(Occurrence::class);
    }

    /**
     * Online occurrences.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function onlineOccurrences()
    {
        return $this->hasMany(OnlineOccurrence::class);
    }

    /**
     * Online occurrences.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function otherCategories() {

        return $this->belongsToMany(
        	Category::class,
        	'course_category',
        	'course_id',
        	'category_id'
        );
    }

    /**
     * Image URL.
     *
     * @return string
     */
    public function getCoverUrlAttribute()
    {
        return empty($this->cover)
                    ? asset('images/placeholder.png')
                    : Storage::url($this->cover);
    }

    /**
     * Classroom schedule.
     *
     * @return string
     */
    public function getClassScheduleAttribute()
    {
        return $this->occurrences->filter(function ($occurrence) {
                            
            return time() < strtotime($occurrence->booking_end);
        });
    }

    /**
     * Virtual schedule.
     *
     * @return string
     */
    public function getVirtualScheduleAttribute()
    {
        return $this->onlineOccurrences->filter(function ($occurrence) {
                            
            return time() < strtotime($occurrence->booking_end);
        });
    }
}
