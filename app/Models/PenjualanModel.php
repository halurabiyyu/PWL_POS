<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PenjualanModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

    protected $fillable = ['user_id', 'pembeli', 'barang_id', 'penjualan_kode', 'penjualan_tanggal'];
    // protected $fillable = ['level_id', 'username', 'nama'];

    public function user(): BelongsTo{
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    } 

    public function stok(): BelongsTo{
        return $this->belongsTo(StokModel::class, 'stok_id', 'stok_id');
    }
    public function barang(): BelongsTo{
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

    public function detailPenjualan(): BelongsTo{
        return $this->belongsTo(DetailPenjualanModel::class, 'detail_id', 'detail_id');
    }
}
