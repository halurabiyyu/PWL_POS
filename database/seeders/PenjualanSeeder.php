<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// ==========PRAKTIKUM 3 Nomor 10==================  

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 1,
                'pembeli' => 'Ahmad',
                'penjualan_kode' => 'J001',
                'penjualan_tanggal' => '2024-02-27 08:00:00',
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 2,
                'pembeli' => 'Ibnu',
                'penjualan_kode' => 'J002',
                'penjualan_tanggal' => '2024-02-27 09:15:00',
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Kevin',
                'penjualan_kode' => 'J003',
                'penjualan_tanggal' => '2024-02-27 10:30:00',
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 1,
                'pembeli' => 'Bobi',
                'penjualan_kode' => 'J004',
                'penjualan_tanggal' => '2024-02-27 11:45:00',
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 2,
                'pembeli' => 'Alya',
                'penjualan_kode' => 'J005',
                'penjualan_tanggal' => '2024-02-27 13:00:00',
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Lili',
                'penjualan_kode' => 'J006',
                'penjualan_tanggal' => '2024-02-27 14:15:00',
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 1,
                'pembeli' => 'Fani',
                'penjualan_kode' => 'J007',
                'penjualan_tanggal' => '2024-02-27 15:30:00',
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 2,
                'pembeli' => 'Defa',
                'penjualan_kode' => 'J008',
                'penjualan_tanggal' => '2024-02-27 16:45:00',
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Bowo',
                'penjualan_kode' => 'J009',
                'penjualan_tanggal' => '2024-02-27 18:00:00',
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 1,
                'pembeli' => 'Anggi',
                'penjualan_kode' => 'J010',
                'penjualan_tanggal' => '2024-02-27 19:15:00',
            ]
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
