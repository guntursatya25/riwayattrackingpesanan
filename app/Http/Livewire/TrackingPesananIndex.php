<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananLogs;
use Livewire\Component;

class TrackingPesananIndex extends Component
{
    protected $updatesQueryString = ['searchTerm'];
    public $searchTerm = '';
    public $hasil;
    public $showResults = false; 
    public $showAll = false;
    public $linkText = 'Lihat riwayat selengkapnya';
    // public $showAll = false;

    public function toggleTables()
    {
        $this->showAll = !$this->showAll;
        $this->linkText = $this->showAll ? 'Sembunyikan selengkapnya' : 'Lihat riwayat selengkapnya';

    } 

    public function search()
    {
        // Reset tabel state sebelum melakukan pencarian baru
        $this->showResults = false;
        $this->hasil = null;

        if (empty($this->searchTerm)) {
            $this->hasil = null;
        } else {
                $this->hasil = Pesanan::with('PesananLogs')->where('no_pesanan', '=', $this->searchTerm)->get();

                if ($this->hasil == null) {
                   
                    $this->hasil = null;
                }
        }
        $this->showResults = true;
        // return dd($this->dataPerHari);


    }
    public function showResults()
    {
        // Atur $showResults menjadi true agar hasil pencarian ditampilkan
        $this->showResults = true;
    }

    public function render()
    {
        return view('livewire.tracking-pesanan-index');
    }
}
