<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Category;
use DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('courses')->truncate();

    	Category::chunk(10, function ($categories) {

    		foreach ($categories as $category) {
    			$category->courses()->saveMany(
                    Course::factory()->count(2)->make()
    			);
    		}
    	});
    }
}
