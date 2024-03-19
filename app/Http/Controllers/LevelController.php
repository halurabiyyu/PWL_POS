<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// PRAKTIKUM 4

class LevelController extends Controller
{
    public function index(){
        // INSERT DATA 
        // DB::insert('insert into m_levels(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'Insert data baru berhasil';

        // UPDATE DATA 
        // $row = DB::update('update m_levels set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil, jumlah data yang diupdate: ' . $row . 'baris';

        // DELETE DATA 
        // $row = DB::delete('delete from m_levels where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: '. $row . 'baris';

        // SELECT DATA 
        $data = DB::select('select * from m_levels');
        return view('level', ['data' => $data]);
    }
    public function tambah(){
        return view('level.tambah');
    }
}
