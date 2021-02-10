<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(VenueSeeder::class);
        $this->call(OccurrenceSeeder::class);
        $this->call(OnlineOccurrenceSeeder::class);
        $this->call(CourseCategorySeeder::class);
        $this->call(CategoryCourseSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
