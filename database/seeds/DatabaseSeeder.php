<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
           'name' => 'Pedro',
           'email' => 'marqeess33@gmail.com',
           'password' => Hash::make('654321'),
       ]);
    }
}
