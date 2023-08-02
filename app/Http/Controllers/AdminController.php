<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\DataTables\PesananDataTable;
use App\Models\PesananLogs;

class AdminController extends Controller
{
    public function tambah(){
        return view('admin.tambahpesanan');
    } 

    public function listtracking(){
        $pesanan = Pesanan::all();
        return view('admin.trackingpesanan',compact('pesanan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'quantityData' => ['required'],
            'address' => ['required'],
            'itemData' => ['required'],
        ]);

        // $items = explode(',', $request->input('itemData'));
        // $quantities = explode(',', $request->input('quantityData'));
        // $track_order = explode(',', $request->input('track_order'));

        $nomax = Pesanan::count();
        $nosurat = 'FIR'.date('Y').sprintf("%04s", abs($nomax + 1)) ;

        $pesanan = new Pesanan;
        $pesanan->nama_pelanggan = $request->nama;
        $pesanan->email = $request->email;
        $pesanan->whatsapp = $request->noWa;
        $pesanan->address = nl2br($request->address);
        $pesanan->pesanan = $request->itemData;
        $pesanan->jumlah = $request->quantityData;
        $pesanan->status = "proses";
        $pesanan->track_order =  $request->track_order;
        $pesanan->no_pesanan =  $nosurat;

        $pesanan->save();

        return back()->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function actiontambahstatus(Request $request){
        $request->validate([
            'qty_hasil' => ['unique:pesananstatuslogs,qtys'],
            'tahap_hasil' => ['unique:pesananstatuslogs,riwayat'],
        ],
        [
            'qty_hasil.unique' => 'Data tidak diperbarui',
            'tahap_hasil.unique' => 'Data tidak diperbarui'
        ]
    );
        $pesanan = Pesanan::find($request->idnya);
        $riwayat = new PesananLogs;
        $riwayat->pesanan()->associate($pesanan);
        $riwayat->qtys = $request->qty_hasil;
        $riwayat->riwayat = $request->tahap_hasil;
        $riwayat->save();
        // return dd($riwayat);
        return redirect()->back()->with('succes','Status berhasil diperbarui');

    }

    public function tambahstatus($id){
        $pesanan = Pesanan::find($id);
        return view('admin.tambahstatus', compact('pesanan'));
    }

}
