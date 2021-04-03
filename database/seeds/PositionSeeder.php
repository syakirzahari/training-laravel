<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_seeds = [
            ['id'=> '1', 'name' => 'Internal'],
            ['id'=> '2', 'name' => 'Student'],
        ];

        foreach ($data_seeds as $seed) {
            Position::firstOrCreate($seed);
        }
    }
}
