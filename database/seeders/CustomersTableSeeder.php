<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('customers')->insert([
        'name' => 'Maria Green',
        'cpf' => '80224334034',
        'birth_date' => '1988-02-08',
        'phone' => '11912341234',
        'email' => 'mariagreen@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'João Silva',
        'cpf' => '66946192001',
        'birth_date' => '1989-05-10',
        'phone' => '11945679876',
        'email' => 'joaosilva@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Kimberly Dias Rosa',
        'cpf' => '36214503009',
        'birth_date' => '1994-12-04',
        'phone' => '11945679876',
        'email' => 'kimberly@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Steve Rocha',
        'cpf' => '37168460072',
        'birth_date' => '1992-10-24',
        'phone' => '11945679876',
        'email' => 'steve@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Gladson Green',
        'cpf' => '52598794060',
        'birth_date' => '1992-10-24',
        'phone' => '11945679876',
        'email' => 'gladsongreen@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Keanu Reavens',
        'cpf' => '15335370033',
        'birth_date' => '1988-03-05',
        'phone' => '11945679876',
        'email' => 'keanu@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Arnold Rocha Pereira',
        'cpf' => '84404390084',
        'birth_date' => '1990-06-15',
        'phone' => '11945679876',
        'email' => 'arnold@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Ana Rose Green',
        'cpf' => '18255812075',
        'birth_date' => '1995-04-05',
        'phone' => '11945679876',
        'email' => 'ana_rose_green@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Brunno Dia Pereira',
        'cpf' => '28264618006',
        'birth_date' => '1989-05-05',
        'phone' => '11945679876',
        'email' => 'brunnodias@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Felicity Smoke',
        'cpf' => '55312571040',
        'birth_date' => '1993-12-02',
        'phone' => '11945679876',
        'email' => 'felicity_smoke@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Oliver Queen',
        'cpf' => '36932526026',
        'birth_date' => '1992-11-22',
        'phone' => '11945679876',
        'email' => 'oliver_queen@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Diggory Santos',
        'cpf' => '35155135079',
        'birth_date' => '1985-01-10',
        'phone' => '11945679876',
        'email' => 'diggory@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Daiane Mel Green',
        'cpf' => '57378440051',
        'birth_date' => '1994-05-14',
        'phone' => '11945679876',
        'email' => 'daianemelgreen@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Deisy Dias Feliz',
        'cpf' => '10142567043',
        'birth_date' => '1993-08-15',
        'phone' => '11945679876',
        'email' => 'deisydias@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Daniel Matias Jr',
        'cpf' => '20575644010',
        'birth_date' => '1993-08-15',
        'phone' => '11945679876',
        'email' => 'danieljr@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Mario Baleia Green',
        'cpf' => '53080942094',
        'birth_date' => '1998-02-25',
        'phone' => '11945679876',
        'email' => 'mariobaleiag@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Gerardi Greendewald',
        'cpf' => '47447585092',
        'birth_date' => '1998-02-25',
        'phone' => '11945679876',
        'email' => 'greendewald@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Harry Thiago Potter',
        'cpf' => '96032888029',
        'birth_date' => '1995-04-02',
        'phone' => '11945679876',
        'email' => 'harrypotter@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
      DB::table('customers')->insert([
        'name' => 'Hemione Grangerr',
        'cpf' => '14295163058',
        'birth_date' => '1995-05-10',
        'phone' => '11945679876',
        'email' => 'hermionegrengerr@email.com.br',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
      ]);
    }
}
