<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;

// PRAKTIKUM 5  

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable){
        // INSERT DATA 
        // $data = [
        //     'kategori_kode' => 'SNK', 
        //     'kategori_nama' => 'Snack/Makanan Ringan',
        //     'created_at' => now()
        // ];
        // DB::table('m_kategori')->insert($data);
        // return 'Insert Data Berhasil';

        // UPDATE DATA 
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return "Update data berhasil. Jumlah data yang diupdate" . $row . "baris";

        // DELETE DATA
        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return 'Delete Data Berhasil. Jumlah Data yang dihapus'. $row . 'baris';

        // SELECT DATA  
        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);

        return $dataTable->render('kategori.index');
    }
}
