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

    protected $fillable = ['user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal'];
    // protected $fillable = ['level_id', 'username', 'nama'];

    public function user(): BelongsTo{
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    public function detailPenjualan(): HasMany{
        return $this->hasMany(DetailPenjualanModel::class, 'detail_id', 'detail_id');
    }
}
