<?php

namespace Database\Seeders;

use App\Enums\DateFormat;
use App\Models\Role;
use App\Models\School;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a school
        $school = new School();
        $school->arabic_name = 'مسهل سكول';
        $school->english_name = 'Mosaheel School';
        $school->arabic_address = 'باب الزوار , الجزائر';
        $school->english_address = 'Bab Ezzouar, Algiers';
        $school->phone = '0556550492';
        $school->email = 'contact@mosaheel.com';
        $school->date_type = DateFormat::DayMonthYear;
        $school->currency = 'DZD';
        $school->logo = '';
        $school->stamp = '';
        $school->default_language_id = 2;
        $school->save();

        // Subscribe the school to Mosaheel with the Deluxe type
        $subscriptionTypeId = DB::table('Mosaheel_Subscription_Types')->where('english_name', 'Deluxe Package')->value('subscription_type_id');

        DB::table('Mosaheel_Subscriptions')->insert([
            'school_id'           => $school->school_id,
            'subscription_type_id' => $subscriptionTypeId,
            'start_date'          => Carbon::now(),
            'end_date'            => Carbon::now(),
        ]);

        // Create a user for the school
        $user = new User();
        $user->username = 'mosaheel';
        $user->password = Hash::make('123');
        $user->first_name = 'Mosaheel';
        $user->last_name = 'Admin';
        $user->email = 'dev@mosaheel.com';
        $user->phone = '0556550492';
        $user->school_id = $school->school_id;
        $user->save();

        // Create a role called "super admin"
        $role = new Role();
        $role->english_name = 'Super Admin';
        $role->arabic_name = 'مدير عام';
        $role->note = 'Role with super admin privileges';
        $role->save();

        // Assign the "super admin" role to the user
        DB::table('User_Roles')->insert([
            'user_id' => $user->user_id,
            'role_id' => $role->role_id,
        ]);
    }
}
