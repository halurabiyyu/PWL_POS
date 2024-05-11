<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:m_kategori',
            'barang_kode' => 'required|unique:m_barang,barang_kode|string|min:3|max:10',
            'barang_nama' => 'required|string|max:100',
            'harga_beli' => 'required|integer',
            'harga_jual' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Check if file image is present in the request
        if ($request->hasFile('image')) {
            $barang = barangModel::create([
                'kategori_id' => $request->kategori_id,
                'barang_kode' => $request->barang_kode,
                'barang_nama' => $request->barang_nama,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'image' => $request->image->hashName(),
            ]);
        } else {
            return response()->json([
                'success' => false,
                'errors' => 'No image file uploaded',
            ], 422);
        }

        if ($barang) {
            return response()->json([
                'success' => true,
                'barang' => $barang
            ], 201);
        }

        return response()->json([
            'success' => false
        ], 409);
    }

    public function show(BarangModel $barang)
    {
        return response()->json([
            'success' => true,
            'barang' => $barang
        ]);
    }

    public function update(Request $request, BarangModel $barang)
    {
        $isUpdated = $barang->update($request->safe()->all());

        if (!$isUpdated) {
            return response()->json([
                'success' => false,
                'errors' => 'conflict with request data and current database',
            ], 409);
        }

        return response()->json([
            'success' => true,
            'barang' => $barang
        ]);
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
