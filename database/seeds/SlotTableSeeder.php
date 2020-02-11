<?php

use Illuminate\Database\Seeder;
use App\Slot;

class SlotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slot::create(['day' => 1, 'start' => '08:00:00', 'end' => '09:00:00']);
        Slot::create(['day' => 1, 'start' => '09:00:00', 'end' => '10:00:00']);
        Slot::create(['day' => 1, 'start' => '10:00:00', 'end' => '11:00:00']);
        Slot::create(['day' => 1, 'start' => '11:00:00', 'end' => '12:00:00']);
        Slot::create(['day' => 1, 'start' => '12:00:00', 'end' => '13:00:00']);
        Slot::create(['day' => 1, 'start' => '13:00:00', 'end' => '14:00:00']);
        Slot::create(['day' => 1, 'start' => '14:00:00', 'end' => '15:00:00']);
        Slot::create(['day' => 1, 'start' => '15:00:00', 'end' => '16:00:00']);
        Slot::create(['day' => 1, 'start' => '16:00:00', 'end' => '17:00:00']);
        Slot::create(['day' => 1, 'start' => '17:00:00', 'end' => '18:00:00']);
        Slot::create(['day' => 1, 'start' => '18:00:00', 'end' => '19:00:00']);
        Slot::create(['day' => 1, 'start' => '19:00:00', 'end' => '20:00:00']);
        Slot::create(['day' => 1, 'start' => '20:00:00', 'end' => '21:00:00']);
        Slot::create(['day' => 1, 'start' => '21:00:00', 'end' => '22:00:00']);
        Slot::create(['day' => 1, 'start' => '22:00:00', 'end' => '23:00:00']);

    }
}
