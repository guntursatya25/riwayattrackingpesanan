<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pesanan;
use Illuminate\Http\Request;
class TableTracking extends Component
{
    public $fullUrl;
    protected $listeners = [
        'openModals','viewDetails'
    ];

    public function mount(Request $request){
        $this->fullUrl = $request->fullUrl();
        // return dd($this->fullUrl);
    }
    public function openModals($id, $action){
        if ($action == 'delete') {
            $this->emit('deleteModal', $id);
        }
        else if($action == 'status'){
            $this->emit('statusModal', $id);
        }
        else if($action == 'edit'){
            $this->emit('showViewModal', $id, $this->fullUrl);
        }
        // return dd($this->fullUrl);

    }
    
    public function render(Request $request)
    {
        // $fullUrl = $request->fullUrl();
        // return dd($fullUrl);
        $pesanan = Pesanan::where('status','proses')->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.table-tracking', compact('pesanan'));
    }
}
