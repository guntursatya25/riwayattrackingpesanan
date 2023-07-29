<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\DataTables\PesananDataTable;

class AdminController extends Controller
{
    public function tambah(){
        return view('admin.tambahpesanan');
    }
    public function index(PesananDataTable $dataTable)
    {
        return $dataTable->render('b');
    }

    public function listtracking(){
        $pesanan = Pesanan::all();
        return view('admin.trackingpesanan',compact('pesanan'));
    }

}
