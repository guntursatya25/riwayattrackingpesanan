<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananLogs;
use Livewire\Component;

class TrackingPesananIndex extends Component
{
    protected $updatesQueryString = ['searchTerm'];
    public $searchTerm = '';
    public $hasil = '';
    public $showResults = false; 
    public $showAll = false;
    public $linkText = 'Lihat riwayat selengkapnya';
    // public $showAll = false;

    // public function toggleTables()
    // {
    //     $this->showAll = !$this->showAll;
    //     $this->linkText = $this->showAll ? 'Sembunyikan selengkapnya' : 'Lihat riwayat selengkapnya';

    // } 

    public function search()
    {
        // Reset tabel state sebelum melakukan pencarian baru
        $this->showResults = false;
        $this->hasil = null;
        $trimmedSearchTerm = trim($this->searchTerm);

        if (empty($trimmedSearchTerm)) {
            $this->hasil = null;
        } else {
                $this->hasil = Pesanan::with('PesananLogs')->where('no_pesanan', '=', $trimmedSearchTerm)->get();

                if ($this->hasil->isEmpty()) {
                    $this->hasil = null;
                }
        }
        $this->showResults = true;
 
    }

    public function render()
    {
        return view('livewire.tracking-pesanan-index');
    }
}
