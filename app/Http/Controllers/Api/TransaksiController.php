<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use App\Models\DetailPenjualanModel;
use App\Models\PenjualanModel;

class TransaksiController extends Controller
{
    public function index()
    {
        // return PenjualanModel::with('detail')->get();
        return DetailPenjualanModel::with(['penjualan', 'barang'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:8|unique:t_penjualan,penjualan_kode',
            'barang_id' => 'required|integer',          
            'jumlah' => 'required|integer',
        ]);

        $tran = PenjualanModel::create([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => now(),
        ]);

        $item = BarangModel::find($request->barang_id);

        $transaksi = DetailPenjualanModel::create([
            'penjualan_id' => $tran->penjualan_id,
            'barang_id' => $request->barang_id,
            'harga' => $item->harga_jual,
            'jumlah' => $request->jumlah,
        ]);

        // $transaksi = PenjualanModel::create($request->all());
        return response()->json($transaksi, 201);
    }

    public function show(PenjualanModel $transaksi)
    {
        $penjualan = PenjualanModel::find($transaksi->penjualan_id);
        $detail = DetailPenjualanModel::with('barang')->where('penjualan_id', '=', $transaksi->penjualan_id)->get();
        return response()->json([
            'Transaksi' => $penjualan,
            'Detail Transaksi' => $detail,
        ]);
    }

    public function update(Request $request, DetailPenjualanModel $transaksi)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'pembeli' => 'required|string|max:100',
            'penjualan_kode' => 'required|string|max:8|unique:t_penjualan,penjualan_kode,' . $transaksi->penjualan_id . ',penjualan_id',
        ]);
        PenjualanModel::find($transaksi->penjualan_id)->update([
            'user_id' => $request->user_id,
            'pembeli' => $request->pembeli,
        ]);

        BarangModel::find($request->barang_id);

        for ($i=0; $i < $request->count; $i++) { 
            DetailPenjualanModel::find($request->id[$i])->update([
                'barang_id' => $request->barang_id[$i],
                'jumlah' => $request->jumlah[$i],
            ]);
        }

        $penjualan = PenjualanModel::find($transaksi->penjualan_id);
        $penjualanDetail = DetailPenjualanModel::with('barang')->where('penjualan_id', '=', $transaksi->penjualan_id)->get();
        return response()->json([
            'Transaksi' => $penjualan,
            'Detail Transaksi' => $penjualanDetail,
        ]);
    }

    public function destroy(DetailPenjualanModel $transaksi)
    {
        $check = PenjualanModel::find($transaksi->penjualan_id);
        if(!$check) {  
            return redirect('/transaksi')->with('error', 'Data transaksi tidak ditemukan');
        }

        try {
            DetailPenjualanModel::where('penjualan_id', $check->penjualan_id)->delete(); 
            PenjualanModel::destroy($transaksi->penjualan_id); 

            return response()->json([
                'success' => true,
                'message' => 'Data terhapus',
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak terhapus karena foreign key',
            ]);
        }
    }
}
