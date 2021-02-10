<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Storage;
use Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
            'slug' => function ($category) {

                return Str::slug($category['name']);
            },
            'description' => $this->faker->paragraph(25),
            'short_description' => $this->faker->paragraph(10),
            'cover' => Storage::putFile(
                'course',
                new File(public_path('images/placeholder.png'))
            ),
            'featured' => (bool) mt_rand(0, 1),
        ];
    }
}
