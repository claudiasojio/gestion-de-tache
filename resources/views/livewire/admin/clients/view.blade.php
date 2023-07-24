<div wire:ignore.self class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">View Tasks</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($clients)
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input value="{{ $clients->nom }}" type="text" class="form-control" name="nom" disabled/>
                       
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control" row="3" disabled> {{ $clients->description }} </textarea>
                        
                    </div>
                    <div class="mb-3">
                        <label class="form-label">statut</label>
                        <input value="{{ $clients->statut }}" type="text" class="form-control" name="nom" disabled/>
                       
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date_debut</label>
                        <input value="{{ $clients->date_debut }}" type="date" name="date_debut" class="form-control"  disabled/>
                       
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date_fin</label>
                        <input value="{{ $clients->date_fin }}" type="date" name="date_fin" class="form-control"  disabled/>
                      
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
