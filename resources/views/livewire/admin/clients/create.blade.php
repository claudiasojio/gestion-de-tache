<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Task Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="store" >
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input wire:model="nom" type="text" class="form-control" name="nom" />
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea wire:model="description" type="text" name="description" class="form-control" row="3"></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date_debut</label>
                        <input wire:model="date_debut" type="date" name="date_debut" class="form-control" />
                        @error('date_debut')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date_fin</label>
                        <input wire:model="date_fin" type="date" name="date_fin" class="form-control" />
                        @error('date_fin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <div class="col-md mb-3">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>