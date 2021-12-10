<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            'name' => 'brian',
            'email' => 'brian@exspace.com',
            'password' => Hash::make("test")
        ]);
        \DB::table('users')->insert([
            'name' => 'victor',
            'email' => 'victor@exspace.com',
            'password' => Hash::make("test")
        ]);
        \DB::table('users')->insert([
            'name' => 'jonas',
            'email' => 'jonas@exspace.com',
            'password' => Hash::make("test")
        ]);
        \DB::table('users')->insert([
            'name' => 'gunnar',
            'email' => 'gunnar@exspace.com',
            'password' => Hash::make("test")
        ]);
    }
}
