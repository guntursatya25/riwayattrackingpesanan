<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ModalTracking extends Component
{
    public $view_id, $view_idk, $view_name, $view_email, $view_wa;
    public $nama, $no_pesanan, $email, $pesanan, $jumlah;
    public $hiddenInputPesanan,$hiddenInputJumlah,$urlcurr;
    
    protected $listeners = ['showViewModal','update','deleteModal','statusModal'];
 
    public function update(){
        // $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        // ]);
        // if ($this->view_id) {
        // $pesanan = Pesanan::find($this->view_id);
        // $pesanan->update([
        //     'nama_pelanggan' => $this->name,
        //     'email' => $this->email
        // ]);
        $dataku = Pesanan::find($this->view_id);

        // $dataku = Pesanan::where('id', $this->view_idk)->first();
        $dataku->nama_pelanggan = $this->nama;
        $dataku->email = $this->email;
        $dataku->pesanan = $this->hiddenInputPesanan;
        $dataku->jumlah = $this->hiddenInputJumlah;

        $dataku->save();
        
        // $fullUrl = request()->url();

        // $url2 = url()->current();
 
        // $this->dispatchBrowserEvent('close-modal');
        // return view('admin.trackingorder'); // Melakukan refresh atau reload halaman
        // return redirect()->to('url()->full();');
        // return redirect()->to('/admin/trackingorder?page=' . $this->currentPage());
// return dd($this->urlcurr);
        return redirect($this->urlcurr)->with(['success' => 'Data Berhasil Disimpan']);
    }
    
    public function statusModal($id){
        $this->dispatchBrowserEvent('show-status-modal');
    }

    public function deleteModal($id){
        $this->dispatchBrowserEvent('show-delete-modal');
        $pesanan = Pesanan::where('id', $id)->first();
        $this->view_id = $id;
        $this->no_pesanan = $pesanan->no_pesanan;
    }

    public function showViewModal($id,$urlcu)
    {
        $this->dispatchBrowserEvent('show-view-modal');
 
        $pesanan = Pesanan::where('id', $id)->first();
        $this->view_id = $id;
        // $this->view_idk = $pesanan->id;
        // return dd($urlcu);

        $this->nama = $pesanan->nama_pelanggan;
        $this->email = $pesanan->email;
        $this->no_pesanan = $pesanan->no_pesanan;
        $this->pesanan = $pesanan->pesanan;
        $this->jumlah = $pesanan->jumlah;
        $this->hiddenInputPesanan =  $pesanan->pesanan;
        $this->hiddenInputJumlah =  $pesanan->jumlah;
        $this->urlcurr= $urlcu;

     }
    public function render()
    {
        // $pesanan = Pesanan::get();

        return view('livewire.modal-tracking');
        // return view('livewire.modal-tracking', compact('pesanan'));
    }
}
