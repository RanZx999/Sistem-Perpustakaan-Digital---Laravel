<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PenerbitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tbl_penerbit')->delete();
        
        // Nama penerbit per negara
        $penerbit = [
            // Indonesia
            ['nama' => 'Gramedia', 'locale' => 'id_ID'],
            ['nama' => 'Mizan', 'locale' => 'id_ID'],
            ['nama' => 'Erlangga', 'locale' => 'id_ID'],
            
            // Jepang
            ['nama' => '講談社', 'locale' => 'ja_JP'],
            ['nama' => '集英社', 'locale' => 'ja_JP'],
            ['nama' => '角川書店', 'locale' => 'ja_JP'],
            
            // Korea
            ['nama' => '문학동네', 'locale' => 'ko_KR'],
            ['nama' => '창비', 'locale' => 'ko_KR'],
            ['nama' => '민음사', 'locale' => 'ko_KR'],
            
            // China
            ['nama' => '人民文学出版社', 'locale' => 'zh_CN'],
            ['nama' => '作家出版社', 'locale' => 'zh_CN'],
            
            // Arab
            ['nama' => 'دار الشروق', 'locale' => 'ar_SA'],
            ['nama' => 'دار الآداب', 'locale' => 'ar_SA'],
            
            // English
            ['nama' => 'Penguin Books', 'locale' => 'en_US'],
            ['nama' => 'HarperCollins', 'locale' => 'en_US'],
            ['nama' => 'Random House', 'locale' => 'en_US'],
        ];
        
        foreach($penerbit as $p)
        { 
            $datafaker = Faker::create($p['locale']);
            
            DB::table('tbl_penerbit')->insert([ 
                'nama_penerbit' => $p['nama'],
                'kota' => $datafaker->city, // ✅ Kota sesuai negara penerbit
                'ISBN' => $datafaker->unique()->isbn13()
            ]); 
        }
    }
}