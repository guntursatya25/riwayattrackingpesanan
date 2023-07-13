<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'pesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pelanggan',
        'no_pesanan',
        'email',
        'whatsapp',
        'address',
        'pesanan',
        'status',
        'track_order',
        'jumlah'
    ];
}