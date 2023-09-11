<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use App\Models\PesananLogs;
use App\Models\Ulasan;
use Livewire\Component;

class TrackingPesananIndex extends Component
{
    protected $updatesQueryString = ['searchTerm'];
    public $searchTerm = '';
    public $hasil = '';
    public $showResults = false; 
    public $idnya, $ulasanstatus, $logstatus, $logstatusdikirim;
    
    public function search()
    {
        $this->showResults = false;
        $this->hasil = null;
        $trimmed = trim($this->searchTerm);
        if (empty($trimmed)) {
            $this->hasil = null;
        } else {
                $this->hasil = Pesanan::with('PesananLogs')->where('kdpsn', '=', $trimmed)->get();
                
                if ($this->hasil->isEmpty()) {
                    $this->hasil = null;
                }else {
                    $this->idnya = $this->hasil->first()->id;
                    $this->logstatus = PesananLogs::where('pesanan_id', $this->idnya)->first();
                    $this->logstatusdikirim = Pesanan::with('PesananLogs')->where('kdpsn', $trimmed)->where('status', 'Diproses')->get();

                    // $this->logstatusdikirim = PesananLogs::where('pesanan_id', $this->idnya)->where('status', 'Diproses')->first();
                    // $this->ulasanstatus = Pesanan::where('kdpsn', $trimmed)->where('status', 'Selesai')->first();
                    // $this->ulasanstatus = Pesanan::where('kdpsn', $trimmed)
                    //             ->whereIn('status', ['Dikirim', 'Selesai'])
                    //             ->first();
                    $this->ulasanstatus = Pesanan::where('kdpsn', $trimmed)
                       ->where('status', 'Dikirim')
                       ->orWhere('status', 'Selesai')
                       ->first();

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
