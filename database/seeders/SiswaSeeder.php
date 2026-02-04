<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_siswa')->delete();
        
        $locales = ['id_ID', 'ar_SA', 'ja_JP', 'ko_KR', 'zh_CN', 'en_US', 'th_TH', 'vi_VN', 'ru_RU', 'ka_GE'  ];
        $fakers = [];

        foreach($locales as $locale) {
            $fakers[] = Faker::create($locale);
        }
        
        for($i = 1; $i <= 20; $i++)
        { 
            $datafaker = $fakers[array_rand($fakers)];
            
            DB::table('tbl_siswa')->insert([ 
                'nis' => $datafaker->unique()->numberBetween(1000, 9999),
                'nama' => $datafaker->name, 
                'kelas' => $datafaker->company, 
                'alamat' => $datafaker->address, 
                'hp' => $datafaker->phoneNumber
            ]); 
        }
    }
}