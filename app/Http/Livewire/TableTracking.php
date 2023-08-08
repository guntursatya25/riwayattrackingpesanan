<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class TableTracking extends Component
{
    public $fullUrl;
    protected $listeners = [
        'openModals'
    ];

    public function mount(Request $request){
        $this->fullUrl = $request->fullUrl();
    }

    public function openModals($id, $action){
        if ($action == 'delete') {
            $this->emit('deleteModal', $id, $this->fullUrl);
        }
        else if($action == 'status'){
            $this->emit('statusModal', $id, $this->fullUrl);
        }
        else if($action == 'edit'){
            $this->emit('showViewModal', $id, $this->fullUrl);
        }
    }
    
    public function render(Request $request)
    {
        $pesanan = Pesanan::where('status','proses')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.table-tracking', compact('pesanan'));
    }
}
