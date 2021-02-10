<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\File;
use Storage;
use Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

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
            'description' => $this->faker->paragraph,
            'cover' => Storage::putFile(
                'category',
                new File(public_path('images/placeholder.png'))
            ),
        ];
    }
}
