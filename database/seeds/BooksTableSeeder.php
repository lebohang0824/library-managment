<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(8). ' ' .Str::random(6),
            'image' => 'images/uploads/01.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(6). ' ' .Str::random(10),
            'image' => 'images/uploads/02.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(5). ' ' .Str::random(8),
            'image' => 'images/uploads/03.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => true,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(8). ' ' .Str::random(8),
            'image' => 'images/uploads/04.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(8). ' ' .Str::random(5),
            'image' => 'images/uploads/05.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(8). ' ' .Str::random(8),
            'image' => 'images/uploads/06.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(5). ' ' .Str::random(10),
            'image' => 'images/uploads/07.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
        DB::table('books')->insert([
        	'user_id' => 1,
            'ref' => Str::random(15),
            'isbn' => Str::random(13),
            'title' => Str::random(10),
            'author' => Str::random(9). ' ' .Str::random(5),
            'image' => 'images/uploads/08.jpg',
            'category' => Str::random(10),
            'stars' => rand(1, 10),
            'booked' => false,
        ]);
    }
}
