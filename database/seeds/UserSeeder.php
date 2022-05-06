<?php

use App\User;
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
            "name"=>"admin",
            "email"=>'admin@utp.com.mx',
            "password"=>bcrypt("admin123"),
            "empresa_id"=>1
        ])->assignRole('admin');
    }
}
