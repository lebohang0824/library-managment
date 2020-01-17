<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
            'name'       => 'Umuzi',
            'surname'    => 'Organisation',
            'cohort'     => 'c-0',
            'department' => 'Management',
            'email'      => 'umuzi@umuzi.org',
            'email_verified_at' => now(),
            'password'   => Hash::make('321321321'),
        ]);
    }
}
