<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'es_tests_admin@yopmail.com'
        ],[
            'name' => 'User test',
            'password' => Hash::make('@pA55w0Rd_T3sT'),
            'email_verified_at' => Carbon::now()
        ]);
    }
}
