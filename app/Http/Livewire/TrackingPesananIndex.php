<?php

namespace App\Http\Livewire;

use App\Models\Pesanan;
use Livewire\Component;

class TrackingPesananIndex extends Component
{
    protected $updatesQueryString = ['searchTerm'];
    public $searchTerm = '';
    public $hasil = [];

    public function search()
    {
        if (empty($this->searchTerm)) {
            $this->hasil = null;
        } else {
        // $this->hasil = Pesanan::where('no_pesanan', 'like', '%'.$this->searchTerm.'%')->get();
        $this->hasil = Pesanan::where('no_pesanan', '=', $this->searchTerm)->get();

            if ($this->hasil->isEmpty()) {
                $this->hasil = null; 
            }
        }

    }

    public function render()
    {
        return view('livewire.tracking-pesanan-index');
    }
}
