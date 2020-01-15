<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('bookings')->insert([
        	'user_id' => 1,
            'book_id' => 3,
            'from' => today(),
            'till' => now()->addWeek('1'),
            'availability' => true
        ]);
    }
}
