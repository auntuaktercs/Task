<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ogroni Admin',
            'email' => 'webadmin@ogroni.com',
            'designation' => 'System Administration',
            'phone' => '012345678901',
            'mobile' => '012345678901',
            'role' => 'Super Admin',
            'password' => bcrypt('12345678'),
            'status' => 'Active',
        ]);
    }
}
