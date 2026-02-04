<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenulisSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_penulis')->delete();
        
        $locales = ['id_ID', 'ar_SA', 'ja_JP', 'ko_KR', 'zh_CN', 'en_US', 'th_TH', 'ru_RU'];
        
        for($i = 1; $i <= 30; $i++)
        { 
            // Pilih negara random
            $locale = $locales[array_rand($locales)];
            $datafaker = Faker::create($locale);
            
            DB::table('tbl_penulis')->insert([ 
                'nama_penulis' => $datafaker->name, // ✅ Nama sesuai negara
                'hp_penulis' => $datafaker->phoneNumber
            ]); 
        }
    }
}