<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlatSeeder extends Seeder
{
    public function run()
    {
        DB::table('alats')->insert([
            [
                'nama_alat'  => 'TAS CARIER EIGER 60L',
                'deskripsi'  => 'Tas carier brand eiger seri rhinos yang terkenal empuk dan ringan.',
                'stok'       => 10,
                'harga_sewa' => 15000,
                'foto'       => 'foto_alat/1BJIDYFNQtBS7FQou9Xb34bN3cK4EYeg0G7nbR1y.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_alat'  => 'TENDA DOME KAP 4',
                'deskripsi'  => 'Tenda dome merk naturhike seri cloud up 4 dengan frame alloy yang kuat dan tahan badai.',
                'stok'       => 15,
                'harga_sewa' => 20000,
                'foto'       => 'foto_alat/91W53BzbEedYxYcKZIxjFDx01ugMjbZhiSncCL5V.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_alat'  => 'SEPATU TREKING EIGER',
                'deskripsi'  => 'Sepatu ternyaman untuk treking ',
                'stok'       => 20,
                'harga_sewa' => 15000,
                'foto'       => 'foto_alat/lvfEkdkL7p30BzqwnSJLJZA7XlOC4MJN7rZEiBVL.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
