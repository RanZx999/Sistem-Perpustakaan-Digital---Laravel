<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_buku')->delete();
        
        $penerbitIds = DB::table('tbl_penerbit')->pluck('id_penerbit')->toArray();
        $penulisIds = DB::table('tbl_penulis')->pluck('id_penulis')->toArray();
        
        $locales = ['id_ID', 'ar_SA', 'ja_JP', 'ko_KR', 'zh_CN', 'en_US', 'th_TH', 'ru_RU'];
        
        for($i = 1; $i <= 20; $i++)
        { 
            $locale = $locales[array_rand($locales)];
            $datafaker = Faker::create($locale);
            
            DB::table('tbl_buku')->insert([ 
                'kode_buku' => 'BK' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'judul' => ucwords($datafaker->words(rand(2, 4), true)), // ✅ RANDOM 2-4 kata sesuai bahasa negara!
                'stok' => $datafaker->numberBetween(5, 50),
                'id_penerbit' => $datafaker->randomElement($penerbitIds),
                'id_penulis' => $datafaker->randomElement($penulisIds)
            ]); 
        }
    }
}