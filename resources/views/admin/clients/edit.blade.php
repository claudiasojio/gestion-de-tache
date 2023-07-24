@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card-header w-50">
                <h3>Edit Tasks
                    <a href="{{ url('admin/clients') }}" class="btn btn-primary btn-sm text-white float-right">BACK</a>
                </h3>
            </div>
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card  w-50">
                <div class="card-body">
                   
                    <form action="{{ url('admin/clients/'.$clients->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" class="form-control" value="{{ $clients->nom}}"  name="nom" />
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea type="text" name="description" class="form-control" row="3">{{ $clients->description}}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Date_debut</label>
                            <input type="date" name="date_debut" value="{{ $clients->date_debut}}"  class="form-control" />
                            @error('date_debut')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date_fin</label>
                            <input type="date" name="date_fin" value="{{ $clients->date_fin}}" class="form-control" />
                            @error('date_fin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="col-md mb-3">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
