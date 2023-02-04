<?php

namespace Database\Seeders;

use App\Models\Plan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'Free',
            'price' => 0,
            'purchasable' => false,
            'storage' => 5242880,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Plan::create([
            'name' => 'Base',
            'price' => 400,
            'purchasable' => true,
            'storage' => 10485760,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Plan::create([
            'name' => 'Large',
            'price' => 800,
            'purchasable' => true,
            'storage' => 15728640,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
