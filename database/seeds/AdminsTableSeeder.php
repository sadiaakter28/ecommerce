<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create(
            [
                'name' => 'admin',
                'phone_number' => '01622222222',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin')
            ]
        );
    }
}
