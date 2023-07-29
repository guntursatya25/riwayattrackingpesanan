<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananLogs extends Model
{
    use HasFactory;
    protected $table = 'PesananStatusLogs';
    protected $primaryKey = 'id';

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'id');
    }
}
