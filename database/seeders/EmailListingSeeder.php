<?php

namespace Database\Seeders;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmailListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table("email_listings")->insert([
            ['email' => $faker->unique()->safeEmail()],
            ['email' =>$faker->unique()->safeEmail()],
            ['email' => $faker->unique()->safeEmail()],
            ['email' => "jonalyn.mobilla@mlhuillier.com"]
        ]);
    }
}
