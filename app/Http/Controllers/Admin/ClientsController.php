<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clients;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientsFormRequest;

class ClientsController extends Controller
{
   public function index()
   {
    return view('admin.clients.index');
   }

   // public function edit(Clients $clients) 
   // {
   //    return view('admin.clients.edit',compact('clients'));
   // }

 
  
   public function  update()
   {
    
      $this->validate([
         'nom'=>'required',
         'description'=>'required',
         'date_debut'=>'required',
         'date_fin'=>'required',
       
        ]);

    $clients =Clients::findOrFail($clients);
    
   
    $clients = new Clients;
    $clients->nom = $this->nom;
    $clients->description = $this->description;
    $clients->statut = "Stand-by";
    $clients->date_debut = $this->date_debut;
    $clients->date_fin = $this->date_fin;
    $clients->update();

    return redirect('admin/clients')->with('message' , 'Tasks  Update Successfully');
   }

 
   public function  terminer($id)
   {
      $clients =Clients::findOrFail($id); 
      $clients->statut = "Finish";
      $clients->update();
      return redirect('admin/clients');
   }

   public function  encours($id)
   {
      $clients =Clients::findOrFail($id); 
      $clients->statut = "Pending...";
      $clients->update();
      return redirect('admin/clients');
   }
}
