<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;

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

    public function create(){
        return view('kategori.create');
    }

    public function store(StorePostRequest $request): RedirectResponse{
        
        // Jobsheet 6 - B Soal No 4 
        // $validatedData = $request->validate([
            //     'kategori_kode' => ['required', 'max:2'],
            //     'kategori_nama' => ['required', 'min:3'],
            // ]);
            // $validatedData = $request->validateWithBag('post', [
                //     'kategori_kode' => ['required', 'max:2'],
                //     'kategori_nama' => ['required', 'min:3'],
                // ]);
                
                
                
                // $validated = $request->validate([
                    //     'kategori_kode' => 'required',
                    //     'kategori_nama' => 'required',
                    // ]) ;
        
        // JOBSHEET 6 - B No 6 
        // $validate = $request->validate([
        //     'kategori_kode' => 'bail|required|max:255',
        //     'kategori_nama' => 'required|min:10',
        // ]);

        // Jobsheet 6 - C No 2
        $validated = $request->validated();
        
        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        

        return redirect('/kategori');
    }
                
    public function edit($id){
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }

    public function edit_save($id, Request $request)
    {
        $kategori= KategoriModel::find($id);

        $kategori->kategori_kode = $request->kategori_kode;
        $kategori->kategori_nama = $request->kategori_nama;
        $kategori->save();
        
        return redirect('/kategori');
    }

    public function hapus($id){
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
