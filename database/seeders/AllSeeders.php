<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MosaheelSubscriptionTypesSeeder::class,
            LanguageSeeder::class,
            SchoolSeeder::class,
        ]);
    }
}
