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
                'first_name' => 'Sadia',
                'last_name' => 'Akter',
                'username' => 'sadiaakter',
                'phone_number' => '01622222222',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'street_address' => 'H-12',
                'division_id' => '1',
                'district_id' => '1',
            ]
        );
    }
}
