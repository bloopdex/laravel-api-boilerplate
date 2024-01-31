<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MosaheelSubscriptionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Mosaheel_Subscription_Types')->insert([
            [
                'arabic_name' => 'باقة أساسية',
                'english_name' => 'Basic Package',
                'amount' => 10000.00,
            ],
            [
                'arabic_name' => 'باقة ممتازة',
                'english_name' => 'Premium Package',
                'amount' => 20000.00,
            ],
            [
                'arabic_name' => 'باقة متميزة',
                'english_name' => 'Deluxe Package',
                'amount' => 30000.00,
            ],
        ]);
    }
}
