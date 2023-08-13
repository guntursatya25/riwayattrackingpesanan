<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use App\Models\Ulasan;

class UlasanSection extends Component
{
    public $rating = 0;
    public $komentar = '';
    public $dataTerima;
    public $datarating;

    protected $listeners = ['dataTerkirim','resetDatarating'];

    protected $rules = [
        'rating' => 'required|not_in:0',
        // 'komentar' => 'required',
    ];
    
    public function setRating($value)
    {
        $this->rating = $value;
    }

    public function dataTerkirim($data){
        $this->dataTerima = $data;
        $this->datarating = Ulasan::where('pesanan_id',$this->dataTerima)->first();
        
         if($this->datarating){
            $this->rating = $this->datarating->rating;
            $this->komentar = $this->datarating->komen;
        }
    }

    public function resetDatarating()
    {
        $this->datarating = null;
        $this->rating = 0;
        $this->komentar = '';
    }

    public function datadisimpan()
    {
        $pesanan = Pesanan::find($this->dataTerima);

        $this->validate(); 
        
        if ($pesanan) {
            $ulasan = Ulasan::where('pesanan_id', $pesanan->id)->first();

            if ($ulasan) {
                session()->flash('error', 'Ulasan untuk pesanan ini sudah ada.');
            } else {
                $ulasanBaru = new Ulasan;
                $ulasanBaru->pesanan()->associate($pesanan);
                $ulasanBaru->rating = $this->rating;
                $ulasanBaru->komen = $this->komentar;
                $ulasanBaru->save();
                session()->flash('sukses', 'Ulasan berhasil disimpan.');
            }
        } else {
            session()->flash('error', 'Pesanan tidak ditemukan.');
        }

        return back();
    }

    public function render()
    {
        return view('livewire.ulasan-section');
    }
}
