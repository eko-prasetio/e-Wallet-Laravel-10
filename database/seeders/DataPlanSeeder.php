<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_plans')->insert([
            [
                'name' => '10G',
                'price' => 100000,
                'operator_card_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '15G',
                'price' => 150000,
                'operator_card_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '20G',
                'price' => 200000,
                'operator_card_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '25G',
                'price' => 200000,
                'operator_card_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '25G',
                'price' => 2500000,
                'operator_card_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '25G',
                'price' => 2500000,
                'operator_card_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '25G',
                'price' => 2500000,
                'operator_card_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         ]);
    }
}
