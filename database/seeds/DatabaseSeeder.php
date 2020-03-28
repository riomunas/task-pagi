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
        // $this->call('UsersTableSeeder');
        DB::table('users')->insert([
            'name' => 'rio',
            'email' => 'rio.munas@gmail.com',
            'password' => Hash::make('bismillah')
        ]);
    }
}
