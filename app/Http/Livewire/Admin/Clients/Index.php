<?php

namespace App\Http\Livewire\Admin\Clients;

use App\Models\Clients;
use Livewire\Component;
use Livewire\WithPagination;




class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $clients_id;

    public function deleteClients($clients_id)
    {
        // dd($clients_id);
        $this->clients_id = $clients_id;
    }
    
    public function destroyClients()
    {
        $clients = clients::find($this->clients_id);   
        $clients ->delete();
        session()->flash('message', 'tasks Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $clientss = Clients::orderBy('id','ASC')->paginate(10);
        return view('livewire.admin.clients.index',['clientss' => $clientss]);
    }
}
