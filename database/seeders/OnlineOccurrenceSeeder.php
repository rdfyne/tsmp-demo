<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\OnlineOccurrence;
use DB;

class OnlineOccurrenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('online_occurrences')->truncate();

    	Course::chunk(10, function ($courses) {

    		foreach ($courses as $course) {
    			$course->onlineOccurrences()->saveMany(
    				OnlineOccurrence::factory()->count(15)->make()
    			);
    		}
    	});
    }
}
