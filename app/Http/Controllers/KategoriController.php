<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Yajra\DataTables\Facades\DataTables;

// PRAKTIKUM 5  

class KategoriController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar kategori',
            'list' => ['Home', 'kategori']
        ];

        $page = (object)[
            'title' => 'Daftar kategori yang terdaftar dalam sistem'
        ];

        $activeMenu = 'kategori';

        $kategori = KategoriModel::all();

        return view('kategori.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request){
        $kategoris = KategoriModel::select('kategori_id', 'kategori_kode', 'kategori_nama');
                    
        if ($request->kategori_id) {
            $kategoris->where('kategori_id', $request->kategori_id);
        }

        return DataTables::of($kategoris)
            ->addIndexColumn()
            ->addColumn('aksi', function ($kategori) {  // menambahkan kolom aksi 
                $btn  = '<a href="'.url('/kategori/' . $kategori->kategori_id).'" class="btn btn-info btn-sm">Detail</a> '; 
                $btn .= '<a href="'.url('/kategori/' . $kategori->kategori_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> '; 
                $btn .= '<form class="d-inline-block" method="POST" action="'. 
                        url('/kategori/'.$kategori->kategori_id).'">' 
                        . csrf_field() . method_field('DELETE') .  
                        '<button type="submit" class="btn btn-danger btn-sm" 
                        onclick="return confirm(\'Apakah Anda yakit menghapus data 
                        ini?\');">Hapus</button></form>';      
                return $btn; 
            }) 
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html 
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah kategori',
            'list'  => ['Home', 'Kategori', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Kategori baru'
        ];

        $kategori = KategoriModel::all();
        $activeMenu = 'kategori';

        return view('kategori.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100',
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data Kategori berhasil disimpan');
    }

    public function show(String $id){
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Detail kategori',
            'list' => ['Home', 'kategori', 'Detail'],
        ];

        $page = (object)[
            'title' => 'Detail kategori'
        ];

        $activeMenu = 'kategori';

        return view('kategori.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function edit(String $id){
        $kategori = KategoriModel::find($id);

        $breadcrumb = (object)[
            'title' => 'Edit kategori',
            'list' => ['Home', 'kategori', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit kategori'
        ];

        $activeMenu = 'kategori';

        return view('kategori.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'kategori' => $kategori, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, String $id){
        $request->validate([
            'kategori_kode' => 'required|string|min:3|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100',
        ]);

        KategoriModel::find($id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect('/kategori')->with('success', 'Data kategori berhasil diubah');
    }

    public function destroy(String $id){
        $check = KategoriModel::find($id);
        if (!$check) {
            return redirect('/kategori')->with('error', 'Data kategori tidak ditemukan');
        }

        try {
            KategoriModel::destroy($id);
            return redirect('/kategori')->with('success', 'Data kategori berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e) {
            return redirect('/kategori')->with('error', 'Data kategori gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
    
    
    
    // public function index(KategoriDataTable $dataTable){
    //     // INSERT DATA 
    //     // $data = [
    //     //     'kategori_kode' => 'SNK', 
    //     //     'kategori_nama' => 'Snack/Makanan Ringan',
    //     //     'created_at' => now()
    //     // ];
    //     // DB::table('m_kategori')->insert($data);
    //     // return 'Insert Data Berhasil';

    //     // UPDATE DATA 
    //     // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
    //     // return "Update data berhasil. Jumlah data yang diupdate" . $row . "baris";

    //     // DELETE DATA
    //     // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
    //     // return 'Delete Data Berhasil. Jumlah Data yang dihapus'. $row . 'baris';

    //     // SELECT DATA  
    //     // $data = DB::table('m_kategori')->get();
    //     // return view('kategori', ['data' => $data]);

    //     return $dataTable->render('kategori.index');
    // }

    // public function create(){
    //     return view('kategori.create');
    // }

    // public function store(StorePostRequest $request): RedirectResponse{
        
    //     // Jobsheet 6 - B Soal No 4 
    //     // $validatedData = $request->validate([
    //         //     'kategori_kode' => ['required', 'max:2'],
    //         //     'kategori_nama' => ['required', 'min:3'],
    //         // ]);
    //         // $validatedData = $request->validateWithBag('post', [
    //             //     'kategori_kode' => ['required', 'max:2'],
    //             //     'kategori_nama' => ['required', 'min:3'],
    //             // ]);
                
                
                
    //             // $validated = $request->validate([
    //                 //     'kategori_kode' => 'required',
    //                 //     'kategori_nama' => 'required',
    //                 // ]) ;
        
    //     // JOBSHEET 6 - B No 6 
    //     // $validate = $request->validate([
    //     //     'kategori_kode' => 'bail|required|max:255',
    //     //     'kategori_nama' => 'required|min:10',
    //     // ]);

    //     // Jobsheet 6 - C No 2
    //     $validated = $request->validated();
        
    //     $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
    //     $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        

    //     return redirect('/kategori');
    // }
                
    // public function edit($id){
    //     $kategori = KategoriModel::find($id);
    //     return view('kategori.edit', ['data' => $kategori]);
    // }

    // public function edit_save($id, Request $request)
    // {
    //     $kategori= KategoriModel::find($id);

    //     $kategori->kategori_kode = $request->kategori_kode;
    //     $kategori->kategori_nama = $request->kategori_nama;
    //     $kategori->save();
        
    //     return redirect('/kategori');
    // }

    // public function hapus($id){
    //     $kategori = KategoriModel::find($id);
    //     $kategori->delete();

    //     return redirect('/kategori');
    // }
}
