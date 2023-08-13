<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\Ulasan;
use Livewire\Component;

class TrackingPesananIndex extends Component
{
    protected $updatesQueryString = ['searchTerm'];
    public $searchTerm = '';
    public $hasil = '';
    public $showResults = false; 
    public $idnya, $logstatus;
    
    public function search()
    {
        $this->showResults = false;
        $this->hasil = null;
        $trimmed = trim($this->searchTerm);
        if (empty($trimmed)) {
            $this->hasil = null;
        } else {
                $this->hasil = Pesanan::with('PesananLogs')->where('no_pesanan', '=', $trimmed)->get();
                          
                if ($this->hasil->isEmpty()) {
                    $this->hasil = null;
                }else {
                    $this->idnya = $this->hasil->first()->id;
                    $this->logstatus = Ulasan::where('pesanan_id', $this->idnya)->first();
                    $this->emit('resetDatarating');

                    $this->emit('dataTerkirim', $this->idnya);
                }
        }
        $this->showResults = true;
    }

    public function render()
    {
        return view('livewire.tracking-pesanan-index');
    }
}
