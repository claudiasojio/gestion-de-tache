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
    public $clients;
    public $nom;
    public $description;
    public $statut;
    public $date_debut;
    public $date_fin;

    public function store()
   {
       $this->validate([
        'nom'=>'required',
        'description'=>'required',
        'date_debut'=>'required',
        'date_fin'=>'required',
      
       ]);

       $clients = new Clients;
       $clients->nom = $this->nom;
       $clients->description = $this->description;
       $clients->statut = "Stand-by";
       $clients->date_debut = $this->date_debut;
       $clients->date_fin = $this->date_fin;
       $clients->save();

       return redirect('')->with('message' , 'Tasks Added Successfully');

   }
   public function edit($id){
      $clients = Clients::find($id);
      if($clients) {
        $this->clients_id = $clients->id;
        $this->nom = $clients->nom;
        $this->description = $clients->description;
        $this->date_debut = $clients->date_debut;
        $this->date_fin = $clients->date_fin;
      }
   }

   
   public function  update()
   {
    
      $this->validate([
         'nom'=>'required',
         'description'=>'required',
         'date_debut'=>'required',
         'date_fin'=>'required',
       
        ]);

    $clients =Clients::find($this->clients_id);
    
   if($clients)   {
    $clients->nom = $this->nom;
    $clients->description = $this->description;
    $clients->statut = "Stand-by";
    $clients->date_debut = $this->date_debut;
    $clients->date_fin = $this->date_fin;
    $clients->save();

    return redirect('admin/clients')->with('message' , 'Tasks  Update Successfully');
   }
   
   }

 


   public function initData($id){
    $clients = Clients::findOrFail($id);
    $this -> clients = $clients;
    $this -> clients_id = $id;

   }

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
