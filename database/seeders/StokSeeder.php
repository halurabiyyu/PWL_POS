<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// ==========PRAKTIKUM 3 Nomor 10==================  

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'stok_id' => 1,
                'barang_id' => 1,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 08:00:00',
                'stok_jumlah' => 10,
            ],
            [
                'stok_id' => 2,
                'barang_id' => 2,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 09:15:00',
                'stok_jumlah' => 20,
            ],
            [
                'stok_id' => 3,
                'barang_id' => 3,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-27 10:30:00',
                'stok_jumlah' => 15,
            ],
            [
                'stok_id' => 4,
                'barang_id' => 4,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-27 11:45:00',
                'stok_jumlah' => 25,
            ],
            [
                'stok_id' => 5,
                'barang_id' => 5,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-27 13:00:00',
                'stok_jumlah' => 30,
            ],
            [
                'stok_id' => 6,
                'barang_id' => 6,
                'user_id' => 3,
                'stok_tanggal' => '2024-02-27 14:15:00',
                'stok_jumlah' => 18,
            ],
            [
                'stok_id' => 7,
                'barang_id' => 7,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 15:30:00',
                'stok_jumlah' => 22,
            ],
            [
                'stok_id' => 8,
                'barang_id' => 8,
                'user_id' => 1,
                'stok_tanggal' => '2024-02-27 16:45:00',
                'stok_jumlah' => 17,
            ],
            [
                'stok_id' => 9,
                'barang_id' => 9,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-27 18:00:00',
                'stok_jumlah' => 24,
            ],
            [
                'stok_id' => 10,
                'barang_id' => 10,
                'user_id' => 2,
                'stok_tanggal' => '2024-02-27 19:15:00',
                'stok_jumlah' => 14,
            ],
        ];
        
        DB::table('t_stok')->insert($data);
    }
}
