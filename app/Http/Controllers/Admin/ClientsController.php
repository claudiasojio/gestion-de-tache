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

   public function create()
   {
    return view('admin.clients.create');
   }

   public function store(ClientsFormRequest $request)
   {
       $validatedData = $request->validated();

       $clients = new Clients;
       $clients->nom = $validatedData['nom'];
       $clients->description = $validatedData['description'];
       $clients->statut = "Stand-by";
       $clients->date_debut = $validatedData['date_debut'];
       $clients->date_fin = $validatedData['date_fin'];
       $clients->save();

       return redirect('admin/clients')->with('message' , 'Tasks Added Successfully');

   }
   public function edit(Clients $clients) 
   {
      return view('admin.clients.edit',compact('clients'));
   }

   public function view(Clients $clients) 
   {
      return view('admin.clients.view',compact('clients'));
   }

   public function  update(ClientsFormRequest $request , $clients)
   {
    
    $validatedData = $request->validated();

    $clients =Clients::findOrFail($clients);
    
   
    $clients->nom = $validatedData['nom'];
    $clients->description = $validatedData['description'];
    $clients->statut = "Stand-by";
    $clients->date_debut = $validatedData['date_debut'];
    $clients->date_fin = $validatedData['date_fin'];
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
