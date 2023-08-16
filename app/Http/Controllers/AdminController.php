<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananLogs;
use App\Models\Ulasan;

class AdminController extends Controller
{
    public function tambah(){
        return view('admin.tambahpesanan');
    } 
    public function profil(){
        return view('admin.myprofile');
    } 

    public function ulasan(){
        $ulasan = Ulasan::with('Pesanan')->paginate(5);
        return view('admin.ulasantable', compact('ulasan'));
    }

    public function admin(){
        $pesanan= Pesanan::all();
        $jumlahProses = $pesanan->where('status', 'Proses')->count();
        $jumlahDikirim = $pesanan->where('status', 'Dikirim')->count();
        $jumlahSelesai = $pesanan->where('status', 'Selesai')->count();
        $ulasan = Ulasan::with('Pesanan')->latest()->limit(3)->get();

        return view('admin.admin', compact('jumlahProses','jumlahDikirim','jumlahSelesai','ulasan'));
    } 

    public function listtracking(){
        $pesanan = Pesanan::all();
        return view('admin.trackingpesanan',compact('pesanan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            // 'nama' => ['required'],
            'quantityData' => ['required'],
            // 'address' => ['required'],
            'itemData' => ['required'],
        ]);

        $nomax = Pesanan::count();
        $nosurat = 'FIR'.date('Y').sprintf("%04s", abs($nomax + 1)) ;

        $pesanan = new Pesanan;
        // $pesanan->nama_pelanggan = $request->nama;
        // $pesanan->email = $request->email;
        // $pesanan->whatsapp = $request->noWa;
        // $pesanan->address = nl2br($request->address);
        $pesanan->namabarang = $request->itemData;
        $pesanan->jumlah = $request->quantityData;
        $pesanan->status = "Proses";
        $pesanan->kdpsn =  $nosurat;

        $pesanan->save();

        return back()->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function actiontambahstatus(Request $request){
    //     $request->validate([
    //         'qty_hasil' => ['unique:pesananstatuslogs,qtys'],
    //         'tahap_hasil' => ['unique:pesananstatuslogs,riwayat'],
    //     ],
    //     [
    //         'qty_hasil.unique' => 'Data tidak diperbarui',
    //         'tahap_hasil.unique' => 'Data tidak diperbarui'
    //     ]
    // );
        $pesanan = Pesanan::find($request->idnya);
        $pesanan->status = $request->status;
        $pesanan->save();
        $riwayat = new PesananLogs;
        $riwayat->pesanan()->associate($pesanan);
        $riwayat->qtys = $request->qty_hasil;
        $riwayat->riwayat = $request->tahap_hasil;
        $riwayat->save();
        // return dd($riwayat);
        return redirect()->back()->with('sukses','Status berhasil ditambahkan');

    }

    public function actionupdatestatus(Request $request){
        $id = $request->idstatus;

        // $pesanan = Pesanan::find($id);
        $pesananlogs = PesananLogs::find($id);
        // $pesanan->namabarang = $request->nambar;
        // $pesanan->jumlah = $request->jumbar;

        $pesananlogs->riwayat = $request->tahapbar;
        $pesananlogs->qtys = $request->jumtapbar;

        // $pesanan->save();
        $pesananlogs->save();

        return back()->with('sukses','Data berhasil diperbarui');
        // return dd($pesananlogs);
    }

    public function tambahstatus($id){
        $pesanan = Pesanan::find($id);
        return view('admin.tambahstatus', compact('pesanan'));
    }

}
