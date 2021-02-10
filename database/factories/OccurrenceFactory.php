<?php

namespace Database\Factories;

use App\Models\Occurrence;
use App\Models\Venue;
use Illuminate\Database\Eloquent\Factories\Factory;

class OccurrenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Occurrence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from' => date('Y-m-d', strtotime('+' . mt_rand(30, 100) . ' days')),
            'to' => function ($occurrence) {

                return date('Y-m-d', strtotime("{$occurrence['from']} +4 days"));
            },
            'kes_cost' => mt_rand(10000, 100000),
            'usd_cost' => function ($occurrence) {

                return $occurrence['kes_cost'] / 100;
            },
            'booking_end' => function ($occurrence) {

                return date('Y-m-d', strtotime("{$occurrence['from']} -5 days"));
            },
            'tax' => mt_rand(0, 35),
            'venue_id' => Venue::inRandomOrder()->first()->id
        ];
    }
}
