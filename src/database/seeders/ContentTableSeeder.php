<?php

namespace Laravia\Content\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ContentTableSeeder extends Seeder
{
    public function run()
    {

        $faker = Faker::create(Posting::class);

        for ($i = 1; $i <= 1000; $i++) {
            $fromDateTime = Carbon::now()->subDays(rand(1, 400))->subMinutes(rand(1, 400));
            DB::table('contents')->insert([
                'title' => $faker->sentence(),
                'body' => $faker->text(200),
                'created_at' => $fromDateTime,
                'updated_at' => $fromDateTime,
                'onlineFrom' => $fromDateTime,
                'onlineTo' => Carbon::now()->addDays(rand(1, 400))->addMinutes(rand(1, 400)),
                'user_id' => 1,
                'active' => 1
            ]);
        }
    }
}
