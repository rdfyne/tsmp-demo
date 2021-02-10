<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;
use Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var bool
     */
    protected static $unguarded = true;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['cover_url'];

    /**
     * Featured courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function featuredCourses()
    {
        return $this->belongsToMany(Course::class, 'category_featured_courses');
    }

    /**
     * Courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
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
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        parent::boot();

        static::creating( function ($query) {

            $query->slug = Str::slug($query->name);
        });

        static::updating( function ($query) {

            $query->slug = $query->slug ?? Str::slug($query->name);
        });
    }
}
