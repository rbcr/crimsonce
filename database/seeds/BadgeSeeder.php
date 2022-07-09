<?php

use App\Badge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert([
            ['name' => 'Nothing', 'range_min' => 0, 'range_max' => 10, 'status' => Badge::$STATUS[1]['id']],
            ['name' => 'Bronze', 'range_min' => 11, 'range_max' => 44, 'status' => Badge::$STATUS[1]['id']],
            ['name' => 'Silver', 'range_min' => 51, 'range_max' => 99, 'status' => Badge::$STATUS[1]['id']],
            ['name' => 'Gold', 'range_min' => 100, 'range_max' => 144, 'status' => Badge::$STATUS[1]['id']],
            ['name' => 'Platinum', 'range_min' => 145, 'range_max' => -1, 'status' => Badge::$STATUS[1]['id']],
        ]);
    }
}
