<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PetugasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_petugas')->delete();
        
        $datafaker = Faker::create('id_ID');
        
        for($i = 1; $i <= 20; $i++)
        { 
            DB::table('tbl_petugas')->insert([ 
                'nip' => $datafaker->unique()->numerify('########'), // 8 digit
                'nama_petugas' => $datafaker->name,
                'hp_petugas' => $datafaker->phoneNumber // ✅ INI YANG BENER!
            ]); 
        }
    }
}