<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PesananLogs;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';
    protected $primaryKey = 'id';

    // protected $fillable = [
    //     'nama_pelanggan',
    //     'no_pesanan',
    //     'email',
    //     'whatsapp',
    //     'address',
    //     'pesanan',
    //     'status',
    //      'jumlah'
    // ];

    protected $fillable = [
        'kdpsn',
        'nama_barang',
        'jumlah',
        'tgl_msk',
        'tgl_krm',
        'tgl_trm',
        'status'
    ];

    public function PesananLogs()
    {
        return $this->hasMany(PesananLogs::class, 'pesanan_id');
    }
}
