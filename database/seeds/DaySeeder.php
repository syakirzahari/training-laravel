<?php

use Illuminate\Database\Seeder;
use App\Day;
class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_seeds = [
            ['id'=> '1', 'name' => 'Monday'],
            ['id'=> '2', 'name' => 'Tuesday'],
            ['id'=> '3', 'name' => 'Wednesday'],
            ['id'=> '4', 'name' => 'Thursday'],
            ['id'=> '5', 'name' => 'Friday'],
            ['id'=> '6', 'name' => 'Saturday'],
            ['id'=> '7', 'name' => 'Sunday'],
        ];

        foreach ($data_seeds as $seed) {
            Day::firstOrCreate($seed);
        }
    }
}
