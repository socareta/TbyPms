<?php

use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'name',
        	'email'=>'plecings@gmail.com',
        	'password'=>bcrypt('123456')
        ]);
    }
}
