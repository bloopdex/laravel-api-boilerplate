<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Arabic language
        DB::table('Languages')->insert([
            'arabic_name'  => 'العربية',
            'english_name' => 'Arabic',
        ]);

        // Insert French language
        DB::table('Languages')->insert([
            'arabic_name'  => 'الفرنسية',
            'english_name' => 'French',
        ]);

        // Insert English language
        DB::table('Languages')->insert([
            'arabic_name'  => 'الإنجليزية',
            'english_name' => 'English',
        ]);
    }
}
