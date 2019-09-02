<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'cpf'           => '11122233345',
            'name'          => 'Administrador', 
            'phone'         => '3599999999', 
            'birth'         => '1994-10-01',
            'gender'        => 'M',  
            'email'         => 'admin@teste.com', 
            'password'      => env('PASSWORD_HASH') ? bcrypt('123456') : '123456', 
        ]);
    }
}
