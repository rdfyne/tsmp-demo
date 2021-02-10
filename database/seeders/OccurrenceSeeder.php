<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Occurrence;
use DB;

class OccurrenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occurrences')->truncate();

    	Course::chunk(10, function ($courses) {

    		foreach ($courses as $course) {
    			$course->occurrences()->saveMany(
    				Occurrence::factory()->count(15)->make()
    			);
    		}
    	});
    }
}
