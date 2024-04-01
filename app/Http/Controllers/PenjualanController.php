<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualanModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\BarangModel;

class PenjualanController extends Controller
{
    public function index(){
        $breadcrumb = (object)[
            'title' => 'Daftar penjualan',
            'list' => ['Home', 'penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';

        $barang = BarangModel::all();

        $user = UserModel::all();

        $penjualan = PenjualanModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'penjualan' => $penjualan, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request){
        $penjualans = PenjualanModel::select('penjualan_id','user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal')
                    ->with('user');


        if ($request->user_id) {
            $penjualans->where('user_id', $request->user_id);
        }


        return DataTables::of($penjualans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {  // menambahkan kolom aksi 
                $btn = '<a href="'.url('/penjualan/' . $penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> '; 
                $btn .= '<a href="'.url('/penjualan/' . $penjualan->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> '; 
                $btn .= '<form class="d-inline-block" method="POST" action="'. 
                        url('/penjualan/'.$penjualan->penjualan_id).'">' 
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
            'title' => 'Tambah penjualan',
            'list'  => ['Home', 'penjualan', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah penjualan baru'
        ];

        $user = UserModel::all();
        $barang = BarangModel::all();
        $activeMenu = 'penjualan';

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page,  'barang' =>$barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        $penjualan = PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
        ]);

        $barang = BarangModel::find($request->barang_id);
        
        DetailPenjualanModel::create([
            'penjualan_id' => $penjualan->penjualan_id,
            'barang_id' => $request->barang_id,
            'harga' => $barang->harga_jual,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    public function show(String $id){
        $detailPenjualan = DetailPenjualanModel::with('penjualan', 'barang')
        ->where('penjualan_id', $id)
        ->get();
    
        $penjualan = PenjualanModel::with('user')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail penjualan',
            'list' => ['Home', 'penjualan', 'Detail'],
        ];

        $page = (object)[
            'title' => 'Detail penjualan'
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan,  'detailPenjualan' => $detailPenjualan, 'activeMenu' => $activeMenu]);
    }

    public function edit(String $id){
        $penjualan = PenjualanModel::find($id);
        $user = UserModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit penjualan',
            'list' => ['Home', 'penjualan', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit penjualan'
        ];

        $barang = BarangModel::all();
        $detailPenjualan = DetailPenjualanModel::find($id);
        $activeMenu = 'penjualan';

        return view('penjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'detailPenjualan' => $detailPenjualan, 'penjualan' => $penjualan, 'user' => $user, 'barang' => $barang, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, String $id){
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_tanggal' => 'required|date',
            'barang_id' => 'required|integer',
            'jumlah' => 'required|integer',
        ]);

        $penjualan = PenjualanModel::find($id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_tanggal' => $request->penjualan_tanggal,
        ]);

        $barang = BarangModel::find($request->barang_id);
        
        DetailPenjualanModel::find($id)->update([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah');
    }

    public function destroy(String $id){
        $check = PenjualanModel::find($id);
        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try {
            DetailPenjualanModel::where('penjualan_id', $check->penjualan_id)->delete(); 
            PenjualanModel::destroy($id);
            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        }catch(\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
