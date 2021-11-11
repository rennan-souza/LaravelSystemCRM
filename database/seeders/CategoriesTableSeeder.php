<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
          'name' => 'Livros',
        ]);

        DB::table('categories')->insert([
          'name' => 'Eletrônicos',
        ]);

        DB::table('categories')->insert([
          'name' => 'Computadores',
        ]);

        DB::table('categories')->insert([
          'name' => 'Celulares',
        ]);
    }
}
