<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Category;
use DB;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('course_category')->truncate();

        Course::chunk(10, function ($courses) {

        	foreach ($courses as $course) {
        		$course->otherCategories()->attach(
        			Category::where('id', '<>', $course->category_id)
        					->take(mt_rand(1, 5))
        					->pluck('id')
        		);
        	}
        });
    }
}
