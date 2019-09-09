<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name='Admin';
        $admin->email='admin@laravel.com';
        $admin->password=bcrypt('rahasia633');
        $admin->save();

        $member = new User();
        $member->name='Member';
        $member->email='member@laravel.com';
        $member->password=bcrypt('rahasia633');
        $member->save();
    }
}
