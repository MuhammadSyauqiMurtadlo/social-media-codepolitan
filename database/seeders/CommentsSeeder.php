<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('comments')->insert([
            [
                'user_id' => 1,
                'post_id' => 1,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'post_id' => 2,
                'content' => $faker->sentence(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
