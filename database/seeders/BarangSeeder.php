<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// ==========PRAKTIKUM 3 Nomor 10==================  


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'B001',
                'barang_nama' => 'Powerbank Asus',
                'harga_beli' => 120000,
                'harga_jual' => 160000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'B002',
                'barang_nama' => 'Earphone Lenovo',
                'harga_beli' => 120000,
                'harga_jual' => 140000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'B003',
                'barang_nama' => 'Kemeja Formal',
                'harga_beli' => 200000,
                'harga_jual' => 300000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'B004',
                'barang_nama' => 'Dress Foral',
                'harga_beli' => 250000,
                'harga_jual' => 350000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'B005',
                'barang_nama' => 'Indomie Goreng',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'B006',
                'barang_nama' => 'Makaroni Pedas',
                'harga_beli' => 5000,
                'harga_jual' => 10000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'B007',
                'barang_nama' => 'Tehbotol Sosro',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'B008',
                'barang_nama' => 'Teh Pucuk',
                'harga_beli' => 4000,
                'harga_jual' => 6000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'B009',
                'barang_nama' => 'Gelang Stainless',
                'harga_beli' => 15000,
                'harga_jual' => 25000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'B010',
                'barang_nama' => 'Kalung Hati',
                'harga_beli' => 35000,
                'harga_jual' => 50000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}
