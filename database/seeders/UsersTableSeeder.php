<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Stephanie Tanner',
        'email' => 'stephanie_admin@systemcrm.com.br',
        'password' => Hash::make('123456'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
  
      DB::table('users')->insert([
        'name' => 'Steve Green',
        'email' => 'steve_user@systemcrm.com.br',
        'password' => Hash::make('123456'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
  
      DB::table('users')->insert([
        'name' => 'Joe Purple',
        'email' => 'joe_admin_user@systemcrm.com.br',
        'password' => Hash::make('123456'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }
}
