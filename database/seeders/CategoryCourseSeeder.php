<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Course;
use DB;

class CategoryCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_featured_courses')->truncate();

        Category::chunk(10, function ($categories) {

        	foreach ($categories as $category) {
        		$category->featuredCourses()->attach(
        			Course::inRandomOrder()
        					->take(mt_rand(1, 5))
        					->pluck('id')
        		);
        	}
        });
    }
}
