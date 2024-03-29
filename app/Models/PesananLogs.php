<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananLogs extends Model
{
    use HasFactory;
    protected $table = 'pesananstatuslogs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'pesanan_id',
        'qtys',
        'riwayat',
        'id_admin',
    ];
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
    
}
